<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasOneElementCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasOneElementCollectionTrait.
 *
 * @see HasOneElementCollectionInterface
 */
trait HasOneElementCollectionTrait
{
    public function hasOneElement(): BoolEnum
    {
        return $this->count()->equalsTo(1);
    }
}
