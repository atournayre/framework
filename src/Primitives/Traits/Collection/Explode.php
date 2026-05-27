<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Aimeos\Map as AimeosMap;
use Atournayre\Contracts\Collection\ExplodeInterface;

/**
 * Trait Explode.
 *
 * @see ExplodeInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Explode
{
    /**
     * Splits a string into a map of elements.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function explode(string $delimiter, string $string, int $limit = PHP_INT_MAX): self
    {
        return self::of(AimeosMap::explode($delimiter, $string, $limit));
    }
}
