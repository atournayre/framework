<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StringInterface;

/**
 * Trait String.
 *
 * @see StringInterface
 */
trait String_
{
    /**
     * Returns an element by key and casts it to string.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to bool)
     *
     * @api
     */
    public function string($key, mixed $default = ''): string
    {
        return $this->collection->string($key, $default);
    }
}
