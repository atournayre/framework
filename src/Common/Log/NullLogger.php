<?php

declare(strict_types=1);

namespace Atournayre\Common\Log;

use Atournayre\Contracts\Log\LoggerInterface;

final class NullLogger extends AbstractLogger implements LoggerInterface
{
    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function exception(\Throwable $exception, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function error($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function emergency($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function alert($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function critical($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function warning($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function notice($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function info($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function debug($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function log($level, $message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function start(array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function end(array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function success(array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function failFast(array $context = []): void
    {
        // Do nothing
    }
}
