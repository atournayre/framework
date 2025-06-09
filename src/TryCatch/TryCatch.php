<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\TryCatch\ExecutableTryCatchInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerCollectionInterface;
use Psr\Log\LoggerInterface;

/**
 * Class TryCatch.
 *
 * Main implementation of the try-catch-finally pattern.
 *
 * @template T
 *
 * @implements ExecutableTryCatchInterface<T>
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

    /**
     * @template TReturn
     *
     * @param \Closure(): TReturn $tryBlock The try block
     *
     * @return self<TReturn>
     */
    private static function createInstance(
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
     * @template TReturn
     *
     * @param \Closure(): TReturn $tryBlock The try block
     *
     * @return self<TReturn>
     *
     * @throws ThrowableInterface
     */
    public static function with(
        \Closure $tryBlock,
        LoggerInterface $logger,
    ): self {
        return self::createInstance(
            tryBlock: $tryBlock,
            handlers: ThrowableHandlerCollection::asList(),
            logger: $logger,
        );
    }

    /**
     * Adds a catch handler for the given throwable class.
     *
     * @param string   $throwableClass The throwable class to catch
     * @param \Closure $handler        The handler function
     *
     * @return self<T>
     *
     * @throws ThrowableInterface
     */
    public function catch(string $throwableClass, \Closure $handler): self
    {
        $newHandlers = clone $this->handlers;
        $newHandlers->add(ThrowableHandler::new($throwableClass, $handler));

        // We need to use the same try block to preserve the template type T
        /** @var \Closure():T $tryBlock */
        $tryBlock = $this->tryBlock;

        /* @var self<T> */
        return self::createInstance(
            tryBlock: $tryBlock,
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
     * @return self<T>
     *
     * @api
     */
    public function finally(\Closure $finallyBlock): self
    {
        // We need to use the same try block to preserve the template type T
        /** @var \Closure():T $tryBlock */
        $tryBlock = $this->tryBlock;

        /* @var self<T> */
        return self::createInstance(
            tryBlock: $tryBlock,
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

            if ($handler instanceof NullThrowableHandler) {
                // If no handler is found, rethrow the exception
                throw $throwable;
            }

            $result = $handler->handle($throwable);
        } finally {
            if ($this->finallyBlock instanceof \Closure) {
                $finallyResult = ($this->finallyBlock)();
                if (null !== $finallyResult) {
                    $result = $finallyResult;
                }
            }
        }

        return $result;
    }
}
