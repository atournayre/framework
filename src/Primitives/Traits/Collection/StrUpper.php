<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrUpperInterface;

/**
 * Trait StrUpper.
 *
 * @see StrUpperInterface
 */
trait StrUpper
{
    /**
     * Converts all alphabetic characters to upper case.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function strUpper(string $encoding = 'UTF-8'): self
    {
        $strUpper = $this->collection->strUpper($encoding);

        return self::of($strUpper);
    }
}
