<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IntInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Int_ as PrimitiveInt_;

/**
 * Trait Int.
 *
 * @see IntInterface
 */
trait Int_
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
    public function int($key, $default = 0): PrimitiveInt_
    {
        $int = $this->collection->int($key, $default);

        return PrimitiveInt_::of($int);
    }
}
