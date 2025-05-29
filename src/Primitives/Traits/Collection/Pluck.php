<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PluckInterface;

/**
 * Trait Pluck.
 *
 * @see PluckInterface
 */
trait Pluck
{
    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function pluck(?string $valuecol = null, ?string $indexcol = null): self
    {
        $pluck = $this->collection->pluck($valuecol, $indexcol);

        return self::of($pluck);
    }
}
