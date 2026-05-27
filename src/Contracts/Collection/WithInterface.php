<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface WithInterface.
 */
interface WithInterface
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
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function with($key, mixed $value): self;
}
