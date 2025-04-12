<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IntCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Int_;

/**
 * Trait IntCollectionTrait.
 *
 * @see IntCollectionInterface
 */
trait IntCollectionTrait
{
    /**
     * Returns an element by key and casts it to integer.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to integer)
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function int($key, $default = 0): Int_
    {
        $int = $this->collection->int($key, $default);

        return Int_::of($int);
    }
}
