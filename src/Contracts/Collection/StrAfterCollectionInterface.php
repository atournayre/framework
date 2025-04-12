<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface StrAfterCollectionInterface.
 */
interface StrAfterCollectionInterface
{
    /**
     * Returns the strings after the passed value.
     *
     * @param string $value    Character or string to search for
     * @param bool   $case     TRUE if search should be case insensitive, FALSE if case-sensitive
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strAfter(string $value, bool $case = false, string $encoding = 'UTF-8'): self;
}
