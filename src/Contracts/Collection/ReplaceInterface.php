<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\Collection;

/**
 * Interface ReplaceInterface.
 */
interface ReplaceInterface
{
    /**
     * Replaces elements recursively.
     *
     * @param iterable<int|string,mixed>|Collection $elements  List of elements
     * @param bool                                  $recursive TRUE to replace recursively (default), FALSE to replace elements only
     *
     * @api
     */
    public function replace($elements, bool $recursive = true): self;
}
