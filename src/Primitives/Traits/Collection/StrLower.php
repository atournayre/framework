<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\StrLowerInterface;

/**
 * Trait StrLower.
 *
 * @see StrLowerInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait StrLower
{
    /**
     * Converts all alphabetic characters to lower case.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function strLower(string $encoding = 'UTF-8'): self
    {
        $strLower = $this->collection->strLower($encoding);

        return self::of($strLower);
    }
}
