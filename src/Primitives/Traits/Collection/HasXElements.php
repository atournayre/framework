<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasXElementsInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasXElements.
 *
 * @see HasXElementsInterface
 */
trait HasXElements
{
    public function hasXElements(int $int): BoolEnum
    {
        return $this->count()->equalsTo($int);
    }
}
