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
    public function ifAny(?\Closure $then = null, ?\Closure $else = null): self;
}
