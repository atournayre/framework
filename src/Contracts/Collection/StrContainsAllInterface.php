<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface StrContainsAllInterface.
 */
interface StrContainsAllInterface
{
    /**
     * Tests if all of the entries contains one of the passed strings.
     *
     * @param mixed  $value    The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strContainsAll($value, string $encoding = 'UTF-8'): BoolEnum;
}
