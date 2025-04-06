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
    // @phpstan-ignore-next-line
    public function __call(string $name, array $arguments)
    {
        if ('__construct' === $name) {
            $this->initializeNull();
        }

        return null;
    }

    private function initializeNull(?bool $isNull = null): void
    {
        $this->null = NullEnum::fromBool($isNull ?? false);
    }

    /**
     * @api
     */
    public function toNullable(): self
    {
        $clone = clone $this;
        $clone->null = NullEnum::yes();

        return $clone;
    }

    /**
     * @api
     */
    public function isNull(): bool
    {
        return $this->null->isNull();
    }

    /**
     * @api
     */
    public function isNotNull(): bool
    {
        return $this->null->isNotNull();
    }

    /**
     * @api
     */
    public static function asNull(): self
    {
        $self = new self();
        $self->null = NullEnum::yes();

        return $self;
    }

    /**
     * @api
     */
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
