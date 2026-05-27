<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface FlipInterface.
 */
interface FlipInterface
{
    /**
     * Exchanges keys with their values.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function flip(): self;
}
