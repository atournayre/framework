<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\UsortInterface;

/**
 * Trait Usort.
 *
 * @see UsortInterface
 */
trait Usort
{
    /**
     * Sorts elements using callback assigning new keys.
     *
     * @api
     */
    public function usort(callable $callback): self
    {
        $this->collection->usort($callback);

        return $this;
    }
}
