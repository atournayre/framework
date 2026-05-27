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
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toArray(): array;
}
