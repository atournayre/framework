<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ToUrlInterface;

/**
 * Trait ToUrl.
 *
 * @see ToUrlInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait ToUrl
{
    /**
     * Creates a HTTP query string.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toUrl(): string
    {
        return $this->collection->toUrl();
    }
}
