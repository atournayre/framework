<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ValuesCollectionInterface.
 */
interface ValuesCollectionInterface
{
    /**
     * Returns all elements with new keys.
     *
     * @api
     */
    public function values(): self;
}
