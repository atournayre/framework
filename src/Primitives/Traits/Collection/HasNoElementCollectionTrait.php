<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasNoElementCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasNoElementCollectionTrait.
 *
 * @see HasNoElementCollectionInterface
 */
trait HasNoElementCollectionTrait
{
    public function hasNoElement(): BoolEnum
    {
        return $this->count()->equalsTo(0);
    }
}
