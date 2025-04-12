<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrEndsCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait StrEndsCollectionTrait.
 *
 * @see StrEndsCollectionInterface
 */
trait StrEndsCollectionTrait
{
    /**
     * Tests if at least one of the entries ends with one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strEnds($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strEnds = $this->collection->strEnds($value, $encoding);

        return BoolEnum::fromBool($strEnds);
    }
}
