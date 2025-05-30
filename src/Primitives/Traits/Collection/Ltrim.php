<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\LtrimInterface;

/**
 * Trait Ltrim.
 *
 * @see LtrimInterface
 */
trait Ltrim
{
    /**
     * Removes the passed characters from the left of all strings.
     *
     * @api
     */
    public function ltrim(string $chars = " \n\r\t\v\x00"): self
    {
        $ltrim = $this->collection->ltrim($chars);

        return self::of($ltrim);
    }
}
