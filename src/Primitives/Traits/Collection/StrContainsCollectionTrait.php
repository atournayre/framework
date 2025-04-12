<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrContainsCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait StrContainsCollectionTrait.
 *
 * @see StrContainsCollectionInterface
 */
trait StrContainsCollectionTrait
{
    /**
     * Tests if at least one of the passed strings is part of at least one entry.
     *
     * @param mixed  $value    The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strContains($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strContains = $this->collection->strContains($value, $encoding);

        return BoolEnum::fromBool($strContains);
    }
}
