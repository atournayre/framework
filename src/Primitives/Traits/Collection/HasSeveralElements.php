<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasSeveralElementsInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasSeveralElements.
 *
 * @see HasSeveralElementsInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait HasSeveralElements
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hasSeveralElements(): BoolEnum
    {
        return $this->count()->greaterThan(1);
    }
}
