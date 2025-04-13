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
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function jsonSerialize()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
