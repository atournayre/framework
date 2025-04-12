<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\TapCollectionInterface;

/**
 * Trait TapCollectionTrait.
 *
 * @see TapCollectionInterface
 */
trait TapCollectionTrait
{
    /**
     * Passes a clone of the map to the given callback.
     *
     * @param callable $callback Function receiving ($map) parameter
     *
     * @api
     */
    public function tap(callable $callback): self
    {
        $tap = $this->collection->tap($callback);

        return self::of($tap);
    }
}
