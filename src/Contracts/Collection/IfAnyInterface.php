<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface IfAnyInterface.
 */
interface IfAnyInterface
{
    /**
     * Executes callbacks if the map contains elements.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ifAny(?\Closure $then = null, ?\Closure $else = null): self;
}
