<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UasortCollectionInterface.
 */
interface UasortCollectionInterface
{
    /**
     * Sorts elements preserving keys using callback.
     *
     * @api
     */
    public function uasort(callable $callback): self;
}
