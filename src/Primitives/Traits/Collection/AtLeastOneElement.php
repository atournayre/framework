<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\AtLeastOneElementInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait AtLeastOneElement.
 *
 * @see AtLeastOneElementInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait AtLeastOneElement
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function atLeastOneElement(): BoolEnum
    {
        return $this->count()->greaterThan(0);
    }
}
