<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface StrReplaceCollectionInterface.
 */
interface StrReplaceCollectionInterface
{
    /**
     * Replaces all occurrences of the search string with the replacement string.
     *
     * @param array<array-key, mixed>|string $search  String or list of strings to search for
     * @param array<array-key, mixed>|string $replace String or list of strings of replacement strings
     * @param bool                           $case    TRUE if replacements should be case insensitive, FALSE if case-sensitive
     *
     * @api
     */
    public function strReplace($search, $replace, bool $case = false): self;
}
