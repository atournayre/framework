<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface StrLowerInterface.
 */
interface StrLowerInterface
{
    /**
     * Converts all alphabetic characters to lower case.
     *
     * @api
     */
    public function strLower(string $encoding = 'UTF-8'): self;
}
