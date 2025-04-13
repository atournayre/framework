<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CollapseInterface;

/**
 * Trait Collapse.
 *
 * @see CollapseInterface
 */
trait Collapse
{
    /**
     * Collapses multi-dimensional elements overwriting elements.
     *
     * @api
     */
    public function collapse(?int $depth = null): self
    {
        $collapse = $this->collection->collapse($depth);

        return self::of($collapse);
    }
}
