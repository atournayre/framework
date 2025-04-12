<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\SomeCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait SomeCollectionTrait.
 *
 * @see SomeCollectionInterface
 */
trait SomeCollectionTrait
{
    /**
     * Tests if at least one element is included.
     *
     * @param \Closure|iterable|mixed $values Anonymous function with (item, key) parameter, element or list of elements to test against
     *
     * @api
     */
    public function some($values, bool $strict = false): BoolEnum
    {
        $some = $this->collection->some($values, $strict);

        return BoolEnum::fromBool($some);
    }
}
