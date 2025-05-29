<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UsortInterface.
 */
interface UsortInterface
{
    /**
     * Sorts elements using callback assigning new keys.
     *
     * @api
     */
    public function usort(callable $callback): self;
}
