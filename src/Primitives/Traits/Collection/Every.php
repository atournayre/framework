<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\EveryInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait Every.
 *
 * @see EveryInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Every
{
    /**
     * Verifies that all elements pass the test of the given callback.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function every(\Closure $callback): BoolEnum
    {
        $every = $this->collection->every($callback);

        return BoolEnum::fromBool($every);
    }
}
