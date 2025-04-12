<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PadCollectionInterface.
 */
interface PadCollectionInterface
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
    public function pad(int $size, $value = null): self;
}
