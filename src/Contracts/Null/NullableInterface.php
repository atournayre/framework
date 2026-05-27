<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Null;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface NullableInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toNullable(): self;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isNull(): bool;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isNotNull(): bool;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function asNull(): self;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function orNull(): ?self;

    /**
     * @param \Throwable|callable $throwable
     *
     * @return $this
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function orThrow($throwable): self;
}
