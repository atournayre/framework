<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface GrepInterface.
 */
interface GrepInterface
{
    /**
     * Applies a regular expression to all elements.
     *
     * @api
     */
    public function grep(string $pattern, int $flags = 0): self;
}
