<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Null;

interface NullableInterface
{
    public function toNullable(): self;

    public function isNull(): bool;

    public function isNotNull(): bool;

    public static function asNull(): self;

    public function orNull(): ?self;

    /**
     * @param \Throwable|callable $throwable
     *
     * @return $this
     *
     * @throws \Throwable
     */
    public function orThrow($throwable): self;
}
