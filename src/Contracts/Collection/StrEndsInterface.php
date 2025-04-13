<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface StrEndsInterface.
 */
interface StrEndsInterface
{
    /**
     * Tests if at least one of the entries ends with one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strEnds($value, string $encoding = 'UTF-8'): BoolEnum;
}
