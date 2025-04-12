<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface StrBeforeCollectionInterface.
 */
interface StrBeforeCollectionInterface
{
    /**
     * Returns the strings before the passed value.
     *
     * @param string $value    Character or string to search for
     * @param bool   $case     TRUE if search should be case insensitive, FALSE if case-sensitive
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strBefore(string $value, bool $case = false, string $encoding = 'UTF-8'): self;
}
