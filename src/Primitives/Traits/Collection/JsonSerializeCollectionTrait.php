<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\JsonSerializeCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait JsonSerializeCollectionTrait.
 *
 * @see JsonSerializeCollectionInterface
 */
trait JsonSerializeCollectionTrait
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
