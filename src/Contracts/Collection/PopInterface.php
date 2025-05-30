<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PopInterface.
 */
interface PopInterface
{
    /**
     * Returns and removes the last element.
     *
     * @return mixed Last element of the map or null if empty
     *
     * @api
     */
    public function pop();
}
