<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ToJsonInterface;

/**
 * Trait ToJson.
 *
 * @see ToJsonInterface
 */
trait ToJson
{
    /**
     * Returns the elements in JSON format.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toJson(int $options = 0): ?string
    {
        return $this->collection->toJson($options);
    }
}
