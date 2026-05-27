<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrAfterInterface;

/**
 * Trait StrAfter.
 *
 * @see StrAfterInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait StrAfter
{
    /**
     * Returns the strings after the passed value.
     *
     * @param string $value    Character or string to search for
     * @param bool   $case     TRUE if search should be case insensitive, FALSE if case-sensitive
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function strAfter(string $value, bool $case = false, string $encoding = 'UTF-8'): self
    {
        $strAfter = $this->collection->strAfter($value, $case, $encoding);

        return self::of($strAfter);
    }
}
