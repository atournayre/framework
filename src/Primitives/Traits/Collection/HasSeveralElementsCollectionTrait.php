<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasSeveralElementsCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasSeveralElementsCollectionTrait.
 *
 * @see HasSeveralElementsCollectionInterface
 */
trait HasSeveralElementsCollectionTrait
{
    public function hasSeveralElements(): BoolEnum
    {
        return $this->count()->greaterThan(1);
    }
}
