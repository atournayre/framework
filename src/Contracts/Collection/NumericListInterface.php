<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface NumericListInterface
{
    /**
     * @param array<int, mixed> $collection
     *
     * @return static
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asList(array $collection, int $precision);
}
