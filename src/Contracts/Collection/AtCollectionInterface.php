<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface AtCollectionInterface.
 */
interface AtCollectionInterface
{
    /**
     * Returns the value at the given position.
     *
     * @return mixed|null
     *
     * @api
     */
    public function at(int $pos);
}
