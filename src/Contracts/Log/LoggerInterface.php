<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Log;

interface LoggerInterface extends \Psr\Log\LoggerInterface
{
    public function setLoggerIdentifier(?string $identifier): void;

    /**
     * @param \Stringable|string $message
     */
    public function emergency($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function alert($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function critical($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function error($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function warning($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function notice($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function info($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function debug($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function log($level, $message, array $context = []): void;

    // @phpstan-ignore-next-line
    public function exception(\Exception $exception, array $context = []): void;

    // @phpstan-ignore-next-line
    public function start(array $context = []): void;

    // @phpstan-ignore-next-line
    public function end(array $context = []): void;

    // @phpstan-ignore-next-line
    public function success(array $context = []): void;

    // @phpstan-ignore-next-line
    public function failFast(array $context = []): void;
}
