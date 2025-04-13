<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ExplodeInterface.
 */
interface ExplodeInterface
{
    /**
     * Splits a string into a map of elements.
     *
     * @api
     */
    public static function explode(string $delimiter, string $string, int $limit = PHP_INT_MAX): self;
}
