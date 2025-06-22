<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Common\Exception\InvalidArgumentException;
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
     * Logs and rethrows the caught exception wrapped in a ThrowableInterface.
     *
     * This method adds a handler that catches any exception thrown in the try block,
     * logs it, and then rethrows it wrapped in a new exception of the specified class.
     * The new exception will preserve the original exception as its previous exception,
     * allowing for proper exception chaining.
     *
     * If no message is provided (or an empty string), the original exception's message will be used.
     * If no code is provided (or 0), the original exception's code will be used.
     *
     * Example usage:
     * ```php
     * $result = TryCatch::with(fn () => $service->doSomething(), $logger)
     *     ->reThrow(CustomException::class, 'Custom error message')
     *     ->execute();
     * ```
     *
     * @param string $throwableClass The ThrowableInterface implementation class to use for the new exception
     * @param string $message        The message for the new exception (defaults to the original exception's message if empty)
     * @param int    $code           The code for the new exception (defaults to the original exception's code if 0)
     *
     * @return self<T>
     *
     * @throws ThrowableInterface If the throwable class doesn't implement ThrowableInterface
     *
     * @api
     */
    public function reThrow(string $throwableClass, string $message = '', int $code = 0): self
    {
        // We need to use the same try block to preserve the template type T
        /** @var \Closure():T $tryBlock */
        $tryBlock = $this->tryBlock;

        $newHandlers = clone $this->handlers;
        $newHandlers->add(ThrowableHandler::new(\Throwable::class, function (\Throwable $throwable) use ($throwableClass, $message, $code) {
            $this->logger->error('Exception caught in TryCatch::reThrow: '.$throwable->getMessage(), [
                'exception' => $throwable,
            ]);

            if (!is_a($throwableClass, ThrowableInterface::class, true)) {
                throw InvalidArgumentException::new(sprintf('Class "%s" must implement "%s"', $throwableClass, ThrowableInterface::class));
            }

            throw $throwableClass::new(message: '' !== $message ? $message : $throwable->getMessage(), code: 0 !== $code ? $code : $throwable->getCode())->withPrevious($throwable);
        }));

        /* @var self<T> */
        return self::createInstance(
            tryBlock: $tryBlock,
            handlers: $newHandlers,
            logger: $this->logger,
            finallyBlock: $this->finallyBlock
        );
    }

    /**
     * Executes the try-catch block and returns the result.
     * Alias for execute().
     *
     * @return T The result of the try block execution
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
            $result = $this->executeFinallyBlock($result);
        }

        return $result;
    }

    /**
     * Executes the finally block if it exists and returns the appropriate result.
     *
     * @param T $currentResult The current result from try or catch block
     *
     * @return T The final result after executing the finally block
     */
    private function executeFinallyBlock(mixed $currentResult): mixed
    {
        if (!$this->finallyBlock instanceof \Closure) {
            return $currentResult;
        }

        $finallyResult = ($this->finallyBlock)();

        return $finallyResult ?? $currentResult;
    }
}
