<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Log;

interface LoggerInterface extends \Psr\Log\LoggerInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setLoggerIdentifier(?string $identifier): void;

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function emergency($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function alert($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function critical($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function error($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function warning($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function notice($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function info($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function debug($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function log($level, $message, array $context = []): void;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function exception(\Throwable $exception, array $context = []): void;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function start(array $context = []): void;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function end(array $context = []): void;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function success(array $context = []): void;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function failFast(array $context = []): void;
}
