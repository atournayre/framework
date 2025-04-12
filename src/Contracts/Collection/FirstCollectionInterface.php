<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface FirstCollectionInterface.
 */
interface FirstCollectionInterface
{
    /**
     * Returns the first element.
     *
     * @param mixed|null $default
     *
     * @return mixed|null
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function first($default = null);
}
