<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\AtInterface;

/**
 * Trait At.
 *
 * @see AtInterface
 */
trait At
{
    /**
     * Returns the value at the given position.
     *
     * @return mixed|null
     *
     * @api
     */
    public function at(int $pos)
    {
        return $this->collection->at($pos);
    }
}
