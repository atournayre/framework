<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface CompareInterface.
 */
interface CompareInterface
{
    /**
     * Compares the value against all map elements.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function compare(string $value, bool $case = true): BoolEnum;
}
