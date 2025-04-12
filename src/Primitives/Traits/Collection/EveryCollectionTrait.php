<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\EveryCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait EveryCollectionTrait.
 *
 * @see EveryCollectionInterface
 */
trait EveryCollectionTrait
{
    /**
     * Verifies that all elements pass the test of the given callback.
     *
     * @api
     */
    public function every(\Closure $callback): BoolEnum
    {
        $every = $this->collection->every($callback);

        return BoolEnum::fromBool($every);
    }
}
