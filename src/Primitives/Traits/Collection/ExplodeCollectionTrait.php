<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ExplodeCollectionInterface;

/**
 * Trait ExplodeCollectionTrait.
 *
 * @see ExplodeCollectionInterface
 */
trait ExplodeCollectionTrait
{
    /**
     * Splits a string into a map of elements.
     *
     * @api
     */
    public static function explode(string $delimiter, string $string, int $limit = PHP_INT_MAX): self
    {
        return self::of(AimeosMap::explode($delimiter, $string, $limit));
    }
}
