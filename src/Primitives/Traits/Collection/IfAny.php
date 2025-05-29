<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IfAnyInterface;

/**
 * Trait IfAny.
 *
 * @see IfAnyInterface
 */
trait IfAny
{
    /**
     * Executes callbacks if the map contains elements.
     *
     * @api
     */
    public function ifAny(?\Closure $then = null, ?\Closure $else = null): self
    {
        $ifAny = $this->collection->ifAny($then, $else);

        return self::of($ifAny);
    }
}
