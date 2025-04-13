<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface BeforeInterface.
 */
interface BeforeInterface
{
    /**
     * Returns the elements before the given one.
     *
     * @param \Closure|int|string $value
     *
     * @api
     */
    public function before($value): self;
}
