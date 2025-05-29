<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface AfterInterface.
 */
interface AfterInterface
{
    /**
     * Returns the elements after the given one.
     *
     * @param \Closure|int|string $value
     *
     * @api
     */
    public function after($value): self;
}
