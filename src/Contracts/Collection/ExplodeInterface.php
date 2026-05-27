<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ExplodeInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface ExplodeInterface
{
    /**
     * Splits a string into a map of elements.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function explode(string $delimiter, string $string, int $limit = PHP_INT_MAX): self;
}
