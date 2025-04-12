<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RtrimCollectionInterface.
 */
interface RtrimCollectionInterface
{
    /**
     * Removes the passed characters from the right of all strings.
     *
     * @api
     */
    public function rtrim(string $chars = " \n\r\t\v\x00"): self;
}
