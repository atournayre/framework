<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface AtLeastOneElementInterface.
 */
interface AtLeastOneElementInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function atLeastOneElement(): BoolEnum;
}
