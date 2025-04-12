<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PadCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait PadCollectionTrait.
 *
 * @see PadCollectionInterface
 */
trait PadCollectionTrait
{
    /**
     * Fill up to the specified length with the given value.
     *
     * @param mixed $value Value to fill up with if the map length is smaller than the given size
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function pad(int $size, $value = null): self
    {
        $this->ensureMutable('pad');
        $pad = $this->collection->pad($size, $value);

        return self::of($pad);
    }
}
