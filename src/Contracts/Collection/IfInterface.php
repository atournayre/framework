<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface IfInterface.
 */
interface IfInterface
{
    /**
     * Executes callbacks depending on the condition.
     *
     * @param \Closure|bool $condition Boolean or function with (map) parameter returning a boolean
     * @param \Closure|null $then      Function with (map, condition) parameter (optional)
     * @param \Closure|null $else      Function with (map, condition) parameter (optional)
     *
     * @api
     */
    public function if($condition, ?\Closure $then = null, ?\Closure $else = null): self;
}
