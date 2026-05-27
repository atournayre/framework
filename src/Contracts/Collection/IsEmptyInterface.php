<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface IsEmptyInterface.
 */
interface IsEmptyInterface
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isEmpty(): BoolEnum;
}
