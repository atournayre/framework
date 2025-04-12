<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UksortCollectionInterface.
 */
interface UksortCollectionInterface
{
    /**
     * Sorts elements by keys using callback.
     *
     * @api
     */
    public function uksort(callable $callback): self;
}
