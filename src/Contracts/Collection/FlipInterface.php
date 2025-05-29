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
    public function flip(): self;
}
