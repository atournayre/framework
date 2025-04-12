<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface FirstKeyCollectionInterface.
 */
interface FirstKeyCollectionInterface
{
    /**
     * Returns the first key.
     *
     * @return mixed First key of map or NULL if empty
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function firstKey();
}
