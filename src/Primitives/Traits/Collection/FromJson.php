<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\FromJsonInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait FromJson.
 *
 * @see FromJsonInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait FromJson
{
    /**
     * Creates a new map from a JSON string.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function fromJson()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
