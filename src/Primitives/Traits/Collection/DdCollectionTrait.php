<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\DdCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait DdCollectionTrait.
 *
 * @see DdCollectionInterface
 */
trait DdCollectionTrait
{
    /**
     * Prints the map content and terminates the script.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function dd()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
