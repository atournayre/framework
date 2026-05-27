<?php

declare(strict_types=1);

namespace Atournayre\Common\Log;

use Atournayre\Contracts\Log\LoggerInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class NullLogger extends AbstractLogger implements LoggerInterface
{
    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function exception(\Throwable $exception, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function error($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function emergency($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function alert($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function critical($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function warning($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function notice($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function info($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function debug($message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function log($level, $message, array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function start(array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function end(array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function success(array $context = []): void
    {
        // Do nothing
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function failFast(array $context = []): void
    {
        // Do nothing
    }
}
