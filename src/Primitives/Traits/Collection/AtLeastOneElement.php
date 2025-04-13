<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\AtLeastOneElementInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait AtLeastOneElement.
 *
 * @see AtLeastOneElementInterface
 */
trait AtLeastOneElement
{
    public function atLeastOneElement(): BoolEnum
    {
        return $this->count()->greaterThan(0);
    }
}
