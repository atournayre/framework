<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\TryCatch\ExecutableTryCatchInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerCollectionInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class TryCatch.
 *
 * Main implementation of the try-catch-finally pattern.
 */
final readonly class TryCatch implements ExecutableTryCatchInterface
{
    private function __construct(
        private \Closure $tryBlock,
        private ThrowableHandlerCollectionInterface $handlers,
        private LoggerInterface $logger,
        /**
         * @var \Closure|null The finally block
         */
        private ?\Closure $finallyBlock = null,
    ) {
    }

    public static function new(
        \Closure $tryBlock,
        ThrowableHandlerCollectionInterface $handlers,
        LoggerInterface $logger,
        ?\Closure $finallyBlock = null,
    ): self {
        return new self(
            tryBlock: $tryBlock,
            handlers: $handlers,
            logger: $logger,
            finallyBlock: $finallyBlock,
        );
    }

    /**
     * Creates a new TryCatch instance with the given try block.
     *
     * @param \Closure $tryBlock The try block
     */
    public static function with(
        \Closure $tryBlock,
        LoggerInterface $logger,
    ): self {
        return new self(
            tryBlock: $tryBlock,
            handlers: ThrowableHandlerCollection::asList(),
            logger: $logger,
            finallyBlock: null,
        );
    }

    /**
     * Adds a catch handler for the given throwable class.
     *
     * @param string   $throwableClass The throwable class to catch
     * @param \Closure $handler        The handler function
     *
     * @throws ThrowableInterface
     */
    public function catch(string $throwableClass, \Closure $handler): self
    {
        $newHandlers = clone $this->handlers;
        $newHandlers->add(ThrowableHandler::new($throwableClass, $handler));

        return self::new(
            tryBlock: $this->tryBlock,
            handlers: $newHandlers,
            logger: $this->logger,
            finallyBlock: $this->finallyBlock
        );
    }

    /**
     * Sets the finally block.
     *
     * @param \Closure $finallyBlock The finally block
     *
     * @api
     */
    public function finally(\Closure $finallyBlock): self
    {
        return self::new(
            tryBlock: $this->tryBlock,
            handlers: $this->handlers,
            logger: $this->logger,
            finallyBlock: $finallyBlock
        );
    }

    /**
     * Executes the try-catch block and returns the result.
     * Alias for execute().
     *
     * @return mixed The result of the try block execution
     *
     * @throws \Throwable If an exception is thrown and not handled
     */
    public function execute(): mixed
    {
        $result = null;

        try {
            $result = ($this->tryBlock)();
        } catch (\Throwable $throwable) {
            $this->logger->error('Exception caught in TryCatch: '.$throwable->getMessage(), [
                'exception' => $throwable,
            ]);

            $handler = $this->handlers->findHandlerFor($throwable);

            if ($handler instanceof ThrowableHandlerInterface) {
                $result = $handler->handle($throwable);
            } else {
                // If no handler is found, rethrow the exception
                throw $throwable;
            }
        } finally {
            if ($this->finallyBlock instanceof \Closure) {
                ($this->finallyBlock)();
            }
        }

        return $result;
    }
}
