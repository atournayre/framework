<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ValuesInterface.
 */
interface ValuesInterface
{
    /**
     * Returns all elements with new keys.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function values(): self;
}
