<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AsMapInterface
{
    /**
     * @param array<string, mixed> $collection
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function asMap(array $collection): self;
}
