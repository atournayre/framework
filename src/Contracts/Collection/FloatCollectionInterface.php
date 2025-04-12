<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\Numeric;

/**
 * Interface FloatCollectionInterface.
 */
interface FloatCollectionInterface
{
    /**
     * Returns an element by key and casts it to float.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to float)
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function float($key, $default = 0.0): Numeric;
}
