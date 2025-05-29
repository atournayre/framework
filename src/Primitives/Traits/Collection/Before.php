<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\BeforeInterface;

/**
 * Trait Before.
 *
 * @see BeforeInterface
 */
trait Before
{
    /**
     * Returns the elements before the given one.
     *
     * @param \Closure|int|string $value
     *
     * @api
     */
    public function before($value): self
    {
        $before = $this->collection->before($value);

        return self::of($before);
    }
}
