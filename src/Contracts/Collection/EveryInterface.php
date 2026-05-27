<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface EveryInterface.
 */
interface EveryInterface
{
    /**
     * Verifies that all elements pass the test of the given callback.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function every(\Closure $callback): BoolEnum;
}
