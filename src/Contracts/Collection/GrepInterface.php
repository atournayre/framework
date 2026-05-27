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
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function grep(string $pattern, int $flags = 0): self;
}
