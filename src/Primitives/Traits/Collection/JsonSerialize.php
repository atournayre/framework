<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\JsonSerializeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait JsonSerialize.
 *
 * @see JsonSerializeInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait JsonSerialize
{
    /**
     * Specifies the data which should be serialized to JSON.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function jsonSerialize()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
