<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface HasSeveralElementsInterface.
 */
interface HasSeveralElementsInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function hasSeveralElements(): BoolEnum;
}
