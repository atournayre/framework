<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface ContainsInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface ContainsInterface
{
    /**
     * Tests if an item exists in the map.
     *
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function contains($key, ?string $operator = null, $value = null): BoolEnum;
}
