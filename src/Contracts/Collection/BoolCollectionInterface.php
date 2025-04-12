<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface BoolCollectionInterface.
 */
interface BoolCollectionInterface
{
    /**
     * Returns an element by key and casts it to boolean.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to bool)
     *
     * @api
     */
    public function bool($key, $default = false): BoolEnum;
}
