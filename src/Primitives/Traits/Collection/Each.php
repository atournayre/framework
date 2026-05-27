<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\EachInterface;

/**
 * Trait Each.
 *
 * @see EachInterface
 */
trait Each
{
    /**
     * Applies a callback to each element.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function each(\Closure $callback): self
    {
        $collection = $this->collection->each($callback);

        return self::of($collection);
    }
}
