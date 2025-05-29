<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasNoElementInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasNoElement.
 *
 * @see HasNoElementInterface
 */
trait HasNoElement
{
    public function hasNoElement(): BoolEnum
    {
        return $this->count()->equalsTo(0);
    }
}
