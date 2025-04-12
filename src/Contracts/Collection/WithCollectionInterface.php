<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface WithCollectionInterface.
 */
interface WithCollectionInterface
{
    /**
     * Returns a copy and sets an element.
     *
     * @param int|string $key   Array key to set or replace
     * @param mixed      $value New value for the given key
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function with($key, $value): self;
}
