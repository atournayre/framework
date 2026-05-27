<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ReplaceInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait Replace.
 *
 * @see ReplaceInterface
 */
trait Replace
{
    /**
     * Replaces elements recursively.
     *
     * @param iterable<int|string,mixed>|Collection $elements  List of elements
     * @param bool                                  $recursive TRUE to replace recursively (default), FALSE to replace elements only
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function replace($elements, bool $recursive = true): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $replace = $this->collection->replace($elements, $recursive);

        return self::of($replace);
    }
}
