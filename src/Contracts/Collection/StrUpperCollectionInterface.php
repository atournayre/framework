<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface StrUpperCollectionInterface.
 */
interface StrUpperCollectionInterface
{
    /**
     * Converts all alphabetic characters to upper case.
     *
     * @api
     */
    public function strUpper(string $encoding = 'UTF-8'): self;
}
