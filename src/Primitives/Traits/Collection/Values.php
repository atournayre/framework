<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ValuesInterface;

/**
 * Trait Values.
 *
 * @see ValuesInterface
 */
trait Values
{
    /**
     * Returns all elements with new keys.
     *
     * @api
     */
    public function values(): self
    {
        $values = $this->collection->values();

        return self::of($values);
    }
}
