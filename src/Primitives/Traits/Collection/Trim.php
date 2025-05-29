<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\TrimInterface;

/**
 * Trait Trim.
 *
 * @see TrimInterface
 */
trait Trim
{
    /**
     * Removes the passed characters from the left/right of all strings.
     *
     * @api
     */
    public function trim(string $chars = " \n\r\t\v\x00"): self
    {
        $trim = $this->collection->trim($chars);

        return self::of($trim);
    }
}
