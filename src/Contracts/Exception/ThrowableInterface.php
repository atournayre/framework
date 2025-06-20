<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Exception;

use Atournayre\Contracts\Log\LoggerInterface;

/**
 * Interface for throwable objects in the framework.
 *
 * This interface extends PHP's native \Throwable interface and provides
 * additional methods for creating and manipulating exceptions in a fluent way.
 */
interface ThrowableInterface extends \Throwable
{
    /**
     * Creates a new instance of the throwable.
     *
     * @param string $message The exception message
     * @param int    $code    The exception code
     *
     * @return self The new throwable instance
     */
    public static function new(string $message = '', int $code = 0): self;

    /**
     * Creates a new instance from an existing throwable.
     *
     * @param \Throwable $throwable The original throwable to convert
     *
     * @return self The new throwable instance
     */
    public static function fromThrowable(\Throwable $throwable): self;

    /**
     * Sets the previous throwable.
     *
     * @param \Throwable $previous The previous throwable
     *
     * @return self A new instance with the previous throwable set
     */
    public function withPrevious(\Throwable $previous): self;

    /**
     * Throws this throwable.
     *
     * @throws ThrowableInterface Always throws this throwable
     */
    public function throw(): void;

    /**
     * Logs this throwable using the provided logger.
     *
     * @param LoggerInterface $logger  The logger to use
     * @param array           $context Additional context information
     */
    public function log(LoggerInterface $logger, array $context = []): void;
}
