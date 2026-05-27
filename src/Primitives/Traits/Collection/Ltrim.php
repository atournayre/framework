<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\LtrimInterface;

/**
 * Trait Ltrim.
 *
 * @see LtrimInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Ltrim
{
    /**
     * Removes the passed characters from the left of all strings.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ltrim(string $chars = " \n\r\t\v\x00"): self
    {
        $ltrim = $this->collection->ltrim($chars);

        return self::of($ltrim);
    }
}
