<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasXElementsInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasXElements.
 *
 * @see HasXElementsInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait HasXElements
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hasXElements(int $int): BoolEnum
    {
        return $this->count()->equalsTo($int);
    }
}
