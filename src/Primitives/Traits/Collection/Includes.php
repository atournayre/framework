<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IncludesInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait Includes.
 *
 * @see IncludesInterface
 */
trait Includes
{
    /**
     * Tests if element is included.
     *
     * @param mixed|array $element Element or elements to search for in the map
     * @param bool        $strict  TRUE to check the type too, using FALSE '1' and 1 will be the same
     *
     * @api
     */
    public function includes($element, bool $strict = false): BoolEnum
    {
        $includes = $this->collection->includes($element, $strict);

        return BoolEnum::fromBool($includes);
    }
}
