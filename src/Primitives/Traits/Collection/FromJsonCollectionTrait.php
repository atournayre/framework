<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\FromJsonCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait FromJsonCollectionTrait.
 *
 * @see FromJsonCollectionInterface
 */
trait FromJsonCollectionTrait
{
    /**
     * Creates a new map from a JSON string.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function fromJson()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
