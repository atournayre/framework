<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface KeysInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface KeysInterface
{
    /**
     * Returns all keys.
     *
     * @api
     *
     * @return array-key[]
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function keys(): array;
}
