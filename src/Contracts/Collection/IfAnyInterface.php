<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface IfAnyInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface IfAnyInterface
{
    /**
     * Executes callbacks if the map contains elements.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ifAny(?\Closure $then = null, ?\Closure $else = null): self;
}
