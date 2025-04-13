<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasSeveralElementsInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasSeveralElements.
 *
 * @see HasSeveralElementsInterface
 */
trait HasSeveralElements
{
    public function hasSeveralElements(): BoolEnum
    {
        return $this->count()->greaterThan(1);
    }
}
