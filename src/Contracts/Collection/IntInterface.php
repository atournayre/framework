<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Int_;

/**
 * Interface IntInterface.
 */
interface IntInterface
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
    public function int($key, $default = 0): Int_;
}
