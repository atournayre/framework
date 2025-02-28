<?php

declare(strict_types=1);

namespace Atournayre\Common\Log;

use Psr\Log\LoggerInterface;

abstract class AbstractLogger implements LoggerInterface
{
    protected LoggerInterface $logger;

    private ?string $logIdentifier = null;

    public function __construct(
        LoggerInterface $logger,
    ) {
        $this->logger = $logger;
    }

    /**
     * @api
     */
    public function setLoggerIdentifier(?string $identifier): void
    {
        $this->logIdentifier = $identifier;
    }

    /**
     * @api
     */
    protected function getLoggerIdentifier(): string
    {
        return $this->logIdentifier ?? static::class;
    }

    /**
     * @param \Stringable|string $message
     */
    protected function prefixMessage(string $prefix, $message): string
    {
        return sprintf('[%s] %s', $prefix, $message);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    abstract public function emergency($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    abstract public function alert($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    abstract public function critical($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    abstract public function error($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    abstract public function warning($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    abstract public function notice($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    abstract public function info($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    abstract public function debug($message, array $context = []): void;

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    abstract public function log($level, $message, array $context = []): void;

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    abstract public function exception(\Exception $exception, array $context = []): void;

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    abstract public function start(array $context = []): void;

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    abstract public function end(array $context = []): void;

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    abstract public function success(array $context = []): void;

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    abstract public function failFast(array $context = []): void;
}
