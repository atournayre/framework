<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PosInterface.
 */
interface PosInterface
{
    /**
     * Returns the numerical index of the value.
     *
     * @param \Closure|mixed $value Value to search for or function with (item, key) parameters return TRUE if value is found
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function pos($value): ?int;
}
