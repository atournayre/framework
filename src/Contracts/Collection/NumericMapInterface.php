<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface NumericMapInterface
{
    /**
     * @param array<string, mixed> $collection
     *
     * @return static
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asMap(array $collection, int $precision);
}
