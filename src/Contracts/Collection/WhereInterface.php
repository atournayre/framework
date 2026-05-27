<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface WhereInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface WhereInterface
{
    /**
     * Filters the list of elements by a given condition.
     *
     * @param string $key   Key or path of the value in the array or object used for comparison
     * @param string $op    Operator used for comparison
     * @param mixed  $value Value used for comparison
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function where(string $key, string $op, mixed $value): self;
}
