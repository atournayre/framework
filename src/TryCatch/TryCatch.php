<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\TryCatch\Contracts\ExecutableTryCatchInterface;
use Atournayre\TryCatch\Contracts\ThrowableHandlerCollectionInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class TryCatch.
 *
 * Main implementation of the try-catch-finally pattern.
 */
final class TryCatch implements ExecutableTryCatchInterface
{
    /**
     * @var \Closure|null The finally block
     */
    private ?\Closure $finallyBlock;

    public function __construct(
        private readonly \Closure                            $tryBlock,
        private readonly ThrowableHandlerCollectionInterface $handlers,
        private readonly LoggerInterface                     $logger,
        ?\Closure                                            $finallyBlock = null,
    )
    {
        $this->finallyBlock = $finallyBlock;
    }

    /**
     * Creates a new TryCatch instance with the given try block.
     *
     * @param \Closure $tryBlock The try block
     * @return self
     */
    public static function with(\Closure $tryBlock): self
    {
        return new self(
            tryBlock: $tryBlock,
            handlers: new ThrowableHandlerCollection(),
            logger: new NullLogger(),
            finallyBlock: null,
        );
    }

    /**
     * Adds a catch handler for the given throwable class.
     *
     * @param string $throwableClass The throwable class to catch
     * @param \Closure $handler The handler function
     *
     * @return self
     * @throws ThrowableInterface
     */
    public function catch(string $throwableClass, \Closure $handler): self
    {
        $newHandlers = clone $this->handlers;
        $newHandlers->add(ThrowableHandler::new($throwableClass, $handler));

        return new self(
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
     * @return self
     */
    public function finally(\Closure $finallyBlock): self
    {
        return new self(
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
     * @throws \Throwable If an exception is thrown and not handled
     */
    public function run(): mixed
    {
        return $this->execute();
    }

    /**
     * {@inheritdoc}
     * @throws \Throwable
     */
    public function execute(): mixed
    {
        $result = null;

        try {
            $result = ($this->tryBlock)();
        } catch (\Throwable $throwable) {
            $this->logger->error('Exception caught in TryCatch: ' . $throwable->getMessage(), [
                'exception' => $throwable,
            ]);

            $handler = $this->handlers->findHandlerFor($throwable);

            if ($handler !== null) {
                $result = $handler->handle($throwable);
            } else {
                // If no handler is found, rethrow the exception
                throw $throwable;
            }
        } finally {
            if ($this->finallyBlock !== null) {
                ($this->finallyBlock)();
            }
        }

        return $result;
    }
}
