<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrUpperCollectionInterface;

/**
 * Trait StrUpperCollectionTrait.
 *
 * @see StrUpperCollectionInterface
 */
trait StrUpperCollectionTrait
{
    /**
     * Converts all alphabetic characters to upper case.
     *
     * @api
     */
    public function strUpper(string $encoding = 'UTF-8'): self
    {
        $strUpper = $this->collection->strUpper($encoding);

        return self::of($strUpper);
    }
}
