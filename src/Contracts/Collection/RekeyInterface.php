<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RekeyInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface RekeyInterface
{
    /**
     * Changes the keys according to the passed function.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function rekey(callable $callback): self;
}
