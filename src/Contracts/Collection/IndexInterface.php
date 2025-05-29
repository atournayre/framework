<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface IndexInterface.
 */
interface IndexInterface
{
    /**
     * Returns the numerical index of the given key.
     *
     * @param \Closure|string|int $value Key to search for or function with (key) parameters return TRUE if key is found
     *
     * @return int|null Position of the found value (zero based) or NULL if not found
     *
     * @api
     */
    public function index($value): ?int;
}
