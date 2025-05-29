<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UasortInterface.
 */
interface UasortInterface
{
    /**
     * Sorts elements preserving keys using callback.
     *
     * @api
     */
    public function uasort(callable $callback): self;
}
