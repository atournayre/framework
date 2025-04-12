<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface LtrimCollectionInterface.
 */
interface LtrimCollectionInterface
{
    /**
     * Removes the passed characters from the left of all strings.
     *
     * @api
     */
    public function ltrim(string $chars = " \n\r\t\v\x00"): self;
}
