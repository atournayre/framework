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
    public function rtrim(string $chars = " \n\r\t\v\x00"): self;
}
