<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PosCollectionInterface.
 */
interface PosCollectionInterface
{
    /**
     * Returns the numerical index of the value.
     *
     * @param \Closure|mixed $value Value to search for or function with (item, key) parameters return TRUE if value is found
     *
     * @api
     */
    public function pos($value): ?int;
}
