<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface GrepInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface GrepInterface
{
    /**
     * Applies a regular expression to all elements.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function grep(string $pattern, int $flags = 0): self;
}
