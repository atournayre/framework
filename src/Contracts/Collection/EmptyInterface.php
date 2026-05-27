<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface EmptyInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface EmptyInterface
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function empty(): BoolEnum;
}
