<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasXElementsCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasXElementsCollectionTrait.
 *
 * @see HasXElementsCollectionInterface
 */
trait HasXElementsCollectionTrait
{
    public function hasXElements(int $int): BoolEnum
    {
        return $this->count()->equalsTo($int);
    }
}
