<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface IsObjectInterface.
 */
interface IsObjectInterface
{
    /**
     * Tests if all entries are objects.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isObject(): BoolEnum;
}
