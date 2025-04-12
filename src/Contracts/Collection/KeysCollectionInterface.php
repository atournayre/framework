<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface KeysCollectionInterface.
 */
interface KeysCollectionInterface
{
    /**
     * Returns all keys.
     *
     * @api
     *
     * @return array-key[]
     */
    public function keys(): array;
}
