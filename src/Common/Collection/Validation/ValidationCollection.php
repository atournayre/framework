<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Validation;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\CollectionTrait;
use Atournayre\Primitives\Collection\MapTrait;

final class ValidationCollection
{
    use CollectionTrait;
    use MapTrait;

    protected static string $type = 'string';

    public function isValid(): BoolEnum
    {
        return $this->hasNoElement();
    }
}
