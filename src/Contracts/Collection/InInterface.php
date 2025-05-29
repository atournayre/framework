<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface InInterface.
 */
interface InInterface
{
    /**
     * Tests if element is included.
     *
     * @param mixed|array $element Element or elements to search for in the map
     *
     * @api
     */
    public function in($element, bool $strict = false): BoolEnum;
}
