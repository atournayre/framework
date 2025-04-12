<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface AllCollectionInterface.
 */
interface AllCollectionInterface
{
    /**
     * Returns the plain array.
     *
     * @return array<int|string, mixed>
     *
     * @api
     */
    public function all(): array;
}
