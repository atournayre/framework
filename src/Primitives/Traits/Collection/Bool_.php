<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\BoolInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait Bool.
 *
 * @see BoolInterface
 */
trait Bool_
{
    /**
     * Returns an element by key and casts it to boolean.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to bool)
     *
     * @api
     */
    public function bool($key, $default = false): BoolEnum
    {
        $bool = $this->collection->bool($key, $default);

        return BoolEnum::fromBool($bool);
    }
}
