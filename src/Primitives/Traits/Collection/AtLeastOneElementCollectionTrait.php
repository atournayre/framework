<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\AtLeastOneElementCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait AtLeastOneElementCollectionTrait.
 *
 * @see AtLeastOneElementCollectionInterface
 */
trait AtLeastOneElementCollectionTrait
{
    public function atLeastOneElement(): BoolEnum
    {
        return $this->count()->greaterThan(0);
    }
}
