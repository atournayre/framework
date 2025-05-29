<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\SuffixInterface;

/**
 * Trait Suffix.
 *
 * @see SuffixInterface
 */
trait Suffix
{
    /**
     * Adds a suffix to each map entry.
     *
     * @param \Closure|string $suffix Suffix string or anonymous function with ($item, $key) as parameters
     * @param int|null        $depth  Maximum depth to dive into multi-dimensional arrays starting from "1"
     *
     * @api
     */
    public function suffix($suffix, ?int $depth = null): self
    {
        $suffix = $this->collection->suffix($suffix, $depth);

        return self::of($suffix);
    }
}
