<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface LtrimInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface LtrimInterface
{
    /**
     * Removes the passed characters from the left of all strings.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ltrim(string $chars = " \n\r\t\v\x00"): self;
}
