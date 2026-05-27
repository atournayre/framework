<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RtrimInterface.
 */
interface RtrimInterface
{
    /**
     * Removes the passed characters from the right of all strings.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function rtrim(string $chars = " \n\r\t\v\x00"): self;
}
