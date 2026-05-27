<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Contracts\TryCatch\ThrowableHandlerInterface;

/**
 * Class ThrowableHandler.
 *
 * Implementation for throwable handlers.
 *
 * @implements ThrowableHandlerInterface<mixed>
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final readonly class ThrowableHandler implements ThrowableHandlerInterface
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(
        private string $throwableClass,
        private \Closure $handlerFunction,
    ) {
    }

    public static function new(
        string $throwableClass,
        \Closure $handlerFunction,
    ): self {
        return new self($throwableClass, $handlerFunction);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function canHandle(\Throwable $throwable): bool
    {
        return $throwable instanceof $this->throwableClass;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function handle(\Throwable $throwable): mixed
    {
        return ($this->handlerFunction)($throwable);
    }
}
