<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface LastKeyCollectionInterface.
 */
interface LastKeyCollectionInterface
{
    /**
     * Returns the last key.
     *
     * @return mixed Last key of map or NULL if empty
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lastKey();
}
