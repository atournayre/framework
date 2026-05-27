<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrContainsAllInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait StrContainsAll.
 *
 * @see StrContainsAllInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait StrContainsAll
{
    /**
     * Tests if all of the entries contains one of the passed strings.
     *
     * @param mixed  $value    The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function strContainsAll(mixed $value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strContainsAll = $this->collection->strContainsAll($value, $encoding);

        return BoolEnum::fromBool($strContainsAll);
    }
}
