<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface IncludesInterface.
 */
interface IncludesInterface
{
    /**
     * Tests if element is included.
     *
     * @param mixed|array $element Element or elements to search for in the map
     * @param bool        $strict  TRUE to check the type too, using FALSE '1' and 1 will be the same
     *
     * @api
     */
    public function includes($element, bool $strict = false): BoolEnum;
}
