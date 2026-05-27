<?php

declare(strict_types=1);

namespace Atournayre\Null;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait NullTrait
{
    protected NullEnum $null;

    /**
     * @param array<int, mixed> $arguments
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __call(string $name, array $arguments)
    {
        if ('__construct' === $name) {
            $this->initializeNull();
        }

        return null;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function initializeNull(?bool $isNull = null): void
    {
        $this->null = NullEnum::fromBool($isNull ?? false);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toNullable(): self
    {
        $clone = clone $this;
        $clone->null = NullEnum::yes();

        return $clone;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isNull(): bool
    {
        return $this->null->isNull();
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isNotNull(): bool
    {
        return $this->null->isNotNull();
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asNull(): self
    {
        $self = new self();
        $self->null = NullEnum::yes();

        return $self;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function orNull(): self
    {
        if ($this->null->isNull()) {
            return $this::asNull();
        }

        return $this;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function orThrow($throwable): self
    {
        if ($this->null->isNotNull()) {
            return $this;
        }

        if ($throwable instanceof \Throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }

        throw $throwable();
    }
}
