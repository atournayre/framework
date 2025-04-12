<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ToUrlCollectionInterface;

/**
 * Trait ToUrlCollectionTrait.
 *
 * @see ToUrlCollectionInterface
 */
trait ToUrlCollectionTrait
{
    /**
     * Creates a HTTP query string.
     *
     * @api
     */
    public function toUrl(): string
    {
        return $this->collection->toUrl();
    }
}
