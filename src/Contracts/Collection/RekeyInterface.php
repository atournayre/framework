<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RekeyInterface.
 */
interface RekeyInterface
{
    /**
     * Changes the keys according to the passed function.
     *
     * @api
     */
    public function rekey(callable $callback): self;
}
