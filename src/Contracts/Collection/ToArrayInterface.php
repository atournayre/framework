<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ToArrayInterface.
 */
interface ToArrayInterface
{
    /**
     * Returns the plain array.
     *
     * @api
     *
     * @return array<int|string, mixed>
     */
    public function toArray(): array;
}
