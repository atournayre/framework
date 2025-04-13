<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface NoneInterface.
 */
interface NoneInterface
{
    /**
     * Tests if none of the elements are part of the map.
     *
     * @param mixed|null $element Element or elements to search for in the map
     *
     * @api
     */
    public function none($element, bool $strict = false): BoolEnum;
}
