<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrEndsAllInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait StrEndsAll.
 *
 * @see StrEndsAllInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait StrEndsAll
{
    /**
     * Tests if all of the entries ends with at least one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function strEndsAll($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strEndsAll = $this->collection->strEndsAll($value, $encoding);

        return BoolEnum::fromBool($strEndsAll);
    }
}
