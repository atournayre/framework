<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\RtrimCollectionInterface;

/**
 * Trait RtrimCollectionTrait.
 *
 * @see RtrimCollectionInterface
 */
trait RtrimCollectionTrait
{
    /**
     * Removes the passed characters from the right of all strings.
     *
     * @api
     */
    public function rtrim(string $chars = " \n\r\t\v\x00"): self
    {
        $rtrim = $this->collection->rtrim($chars);

        return self::of($rtrim);
    }
}
