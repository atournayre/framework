<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\Int_;

/**
 * Interface CountInterface.
 */
interface CountInterface
{
    /**
     * Returns the total number of elements.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function count(): Int_;
}
