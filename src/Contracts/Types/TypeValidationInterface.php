<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Types;

use Atournayre\Common\Collection\Validation\ValidationCollection;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface TypeValidationInterface
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function validate(): ValidationCollection;
}
