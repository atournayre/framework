<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface SomeInterface.
 */
interface SomeInterface
{
    /**
     * Tests if at least one element is included.
     *
     * @param \Closure|iterable|mixed $values Anonymous function with (item, key) parameter, element or list of elements to test against
     *
     * @api
     */
    public function some($values, bool $strict = false): BoolEnum;
}
