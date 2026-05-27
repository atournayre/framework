<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasOneElementInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasOneElement.
 *
 * @see HasOneElementInterface
 */
trait HasOneElement
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function hasOneElement(): BoolEnum
    {
        return $this->count()->equalsTo(1);
    }
}
