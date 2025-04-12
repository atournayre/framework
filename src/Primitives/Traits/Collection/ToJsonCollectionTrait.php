<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ToJsonCollectionInterface;

/**
 * Trait ToJsonCollectionTrait.
 *
 * @see ToJsonCollectionInterface
 */
trait ToJsonCollectionTrait
{
    /**
     * Returns the elements in JSON format.
     *
     * @api
     */
    public function toJson(int $options = 0): ?string
    {
        return $this->collection->toJson($options);
    }
}
