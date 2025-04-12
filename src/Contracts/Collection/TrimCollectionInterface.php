<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface TrimCollectionInterface.
 */
interface TrimCollectionInterface
{
    /**
     * Removes the passed characters from the left/right of all strings.
     *
     * @api
     */
    public function trim(string $chars = " \n\r\t\v\x00"): self;
}
