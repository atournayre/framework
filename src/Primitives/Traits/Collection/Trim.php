<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\TrimInterface;

/**
 * Trait Trim.
 *
 * @see TrimInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Trim
{
    /**
     * Removes the passed characters from the left/right of all strings.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function trim(string $chars = " \n\r\t\v\x00"): self
    {
        $trim = $this->collection->trim($chars);

        return self::of($trim);
    }
}
