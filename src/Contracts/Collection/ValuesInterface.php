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
    public function values(): self;
}
