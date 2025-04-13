<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UksortInterface.
 */
interface UksortInterface
{
    /**
     * Sorts elements by keys using callback.
     *
     * @api
     */
    public function uksort(callable $callback): self;
}
