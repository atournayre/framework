<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\InInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait In.
 *
 * @see InInterface
 */
trait In
{
    /**
     * Tests if element is included.
     *
     * @param mixed|array $element Element or elements to search for in the map
     *
     * @api
     */
    public function in($element, bool $strict = false): BoolEnum
    {
        $in = $this->collection->in($element, $strict);

        return BoolEnum::fromBool($in);
    }
}
