<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\JoinInterface;

/**
 * Trait Join.
 *
 * @see JoinInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Join
{
    /**
     * Returns concatenated elements as string with separator.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function join(string $glue = ''): string
    {
        return $this->collection->values()->join($glue);
    }
}
