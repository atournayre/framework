<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface AtInterface.
 */
interface AtInterface
{
    /**
     * Returns the value at the given position.
     *
     * @return mixed|null
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function at(int $pos);
}
