<?php

declare(strict_types=1);

namespace Atournayre\Common\Log;

use Atournayre\Contracts\Log\LoggerInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class DefaultLogger extends AbstractLogger implements LoggerInterface
{
    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function exception(\Throwable $exception, array $context = []): void
    {
        $context['exception'] = $exception;
        $context['trace'] = $exception->getTrace();

        $this->logger->error($exception->getMessage(), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function error($message, array $context = []): void
    {
        $this->logger->error($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function emergency($message, array $context = []): void
    {
        $this->logger->emergency($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function alert($message, array $context = []): void
    {
        $this->logger->alert($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function critical($message, array $context = []): void
    {
        $this->logger->critical($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function warning($message, array $context = []): void
    {
        $this->logger->warning($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function notice($message, array $context = []): void
    {
        $this->logger->notice($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function info($message, array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function debug($message, array $context = []): void
    {
        $this->logger->debug($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function log($level, $message, array $context = []): void
    {
        $this->logger->log($level, $this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function start(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), 'start'), $context);
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function end(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), 'end'), $context);
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function success(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), 'success'), $context);
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function failFast(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), 'fail fast'), $context);
    }
}
