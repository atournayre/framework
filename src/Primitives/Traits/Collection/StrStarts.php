<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrStartsInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait StrStarts.
 *
 * @see StrStartsInterface
 */
trait StrStarts
{
    /**
     * Tests if at least one of the entries starts with at least one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strStarts($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strStarts = $this->collection->strStarts($value, $encoding);

        return BoolEnum::fromBool($strStarts);
    }
}
