<?php

declare(strict_types=1);

namespace Atournayre\Common\Log;

use Psr\Log\LoggerInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
abstract class AbstractLogger implements LoggerInterface
{
    private ?string $logIdentifier = null;

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __construct(
        protected LoggerInterface $logger,
    ) {
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setLoggerIdentifier(?string $identifier): void
    {
        $this->logIdentifier = $identifier;
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    protected function getLoggerIdentifier(): string
    {
        return $this->logIdentifier ?? static::class;
    }

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    protected function prefixMessage(string $prefix, $message): string
    {
        return sprintf('[%s] %s', $prefix, $message);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function emergency($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function alert($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function critical($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function error($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function warning($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function notice($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function info($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function debug($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function log($level, $message, array $context = []): void;

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function exception(\Exception $exception, array $context = []): void;

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function start(array $context = []): void;

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function end(array $context = []): void;

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function success(array $context = []): void;

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    abstract public function failFast(array $context = []): void;
}
