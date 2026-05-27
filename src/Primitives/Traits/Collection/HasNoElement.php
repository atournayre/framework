<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasNoElementInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasNoElement.
 *
 * @see HasNoElementInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait HasNoElement
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hasNoElement(): BoolEnum
    {
        return $this->count()->equalsTo(0);
    }
}
