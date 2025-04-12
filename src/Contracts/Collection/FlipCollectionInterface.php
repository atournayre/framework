<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface FlipCollectionInterface.
 */
interface FlipCollectionInterface
{
    /**
     * Exchanges keys with their values.
     *
     * @api
     */
    public function flip(): self;
}
