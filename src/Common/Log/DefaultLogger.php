<?php

declare(strict_types=1);

namespace Atournayre\Common\Log;

use Atournayre\Contracts\Log\LoggerInterface;

final class DefaultLogger extends AbstractLogger implements LoggerInterface
{
    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function exception(\Exception $exception, array $context = []): void
    {
        $context['exception'] = $exception;
        $this->logger->error($exception->getMessage(), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function error($message, array $context = []): void
    {
        $this->logger->error($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function emergency($message, array $context = []): void
    {
        $this->logger->emergency($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function alert($message, array $context = []): void
    {
        $this->logger->alert($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function critical($message, array $context = []): void
    {
        $this->logger->critical($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function warning($message, array $context = []): void
    {
        $this->logger->warning($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function notice($message, array $context = []): void
    {
        $this->logger->notice($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function info($message, array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function debug($message, array $context = []): void
    {
        $this->logger->debug($this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function log($level, $message, array $context = []): void
    {
        $this->logger->log($level, $this->prefixMessage($this->getLoggerIdentifier(), $message), $context);
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function start(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), 'start'), $context);
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function end(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), 'end'), $context);
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function success(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), 'success'), $context);
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function failFast(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->getLoggerIdentifier(), 'fail fast'), $context);
    }
}
