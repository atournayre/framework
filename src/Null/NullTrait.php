<?php

declare(strict_types=1);

namespace Atournayre\Null;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;

trait NullTrait
{
    protected NullEnum $null;

    /**
     * @param array<int, mixed> $arguments
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function __call(string $name, array $arguments)
    {
        if ('__construct' === $name) {
            $this->initializeNull();
        }

        return null;
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private function initializeNull(?bool $isNull = null): void
    {
        $this->null = NullEnum::fromBool($isNull ?? false);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toNullable(): self
    {
        $clone = clone $this;
        $clone->null = NullEnum::yes();

        return $clone;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isNull(): bool
    {
        return $this->null->isNull();
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isNotNull(): bool
    {
        return $this->null->isNotNull();
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function asNull(): self
    {
        $self = new self();
        $self->null = NullEnum::yes();

        return $self;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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
