<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PutCollectionInterface.
 */
interface PutCollectionInterface
{
    /**
     * Sets the given key and value in the map.
     *
     * @param int|string $key   Key to set the new value for
     * @param mixed      $value New element that should be set
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function put($key, $value): self;
}
