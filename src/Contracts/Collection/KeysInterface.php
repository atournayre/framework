<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface KeysInterface.
 */
interface KeysInterface
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
