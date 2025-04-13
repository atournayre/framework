<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrStartsAllInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait StrStartsAll.
 *
 * @see StrStartsAllInterface
 */
trait StrStartsAll
{
    /**
     * Tests if all of the entries starts with one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strStartsAll($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strStartsAll = $this->collection->strStartsAll($value, $encoding);

        return BoolEnum::fromBool($strStartsAll);
    }
}
