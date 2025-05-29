<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface LastKeyInterface.
 */
interface LastKeyInterface
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
