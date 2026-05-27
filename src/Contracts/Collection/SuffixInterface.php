<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SuffixInterface.
 */
interface SuffixInterface
{
    /**
     * Adds a suffix to each map entry.
     *
     * @param \Closure|string $suffix Suffix string or anonymous function with ($item, $key) as parameters
     * @param int|null        $depth  Maximum depth to dive into multi-dimensional arrays starting from "1"
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function suffix($suffix, ?int $depth = null): self;
}
