<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrContainsAllCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait StrContainsAllCollectionTrait.
 *
 * @see StrContainsAllCollectionInterface
 */
trait StrContainsAllCollectionTrait
{
    /**
     * Tests if all of the entries contains one of the passed strings.
     *
     * @param mixed  $value    The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strContainsAll($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strContainsAll = $this->collection->strContainsAll($value, $encoding);

        return BoolEnum::fromBool($strContainsAll);
    }
}
