<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AsListInterface
{
    /**
     * @param array<int, mixed> $collection
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function asList(array $collection): self;
}
