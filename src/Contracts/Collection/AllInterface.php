<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface AllInterface.
 */
interface AllInterface
{
    /**
     * Returns the plain array.
     *
     * @return array<int|string, mixed>
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function all(): array;
}
