<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\PadInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Pad.
 *
 * @see PadInterface
 */
trait Pad
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
    public function pad(int $size, mixed $value = null): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $pad = $this->collection->pad($size, $value);

        return self::of($pad);
    }
}
