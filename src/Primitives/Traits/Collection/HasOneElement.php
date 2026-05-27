<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasOneElementInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasOneElement.
 *
 * @see HasOneElementInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait HasOneElement
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hasOneElement(): BoolEnum
    {
        return $this->count()->equalsTo(1);
    }
}
