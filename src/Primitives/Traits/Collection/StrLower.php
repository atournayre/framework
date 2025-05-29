<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrLowerInterface;

/**
 * Trait StrLower.
 *
 * @see StrLowerInterface
 */
trait StrLower
{
    /**
     * Converts all alphabetic characters to lower case.
     *
     * @api
     */
    public function strLower(string $encoding = 'UTF-8'): self
    {
        $strLower = $this->collection->strLower($encoding);

        return self::of($strLower);
    }
}
