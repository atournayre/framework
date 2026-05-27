<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface StrLowerInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface StrLowerInterface
{
    /**
     * Converts all alphabetic characters to lower case.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function strLower(string $encoding = 'UTF-8'): self;
}
