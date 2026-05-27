<?php

declare(strict_types=1);

namespace Atournayre\Common\Traits;

use Atournayre\Primitives\BoolEnum;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait IsTrait
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function is(self $object): BoolEnum
    {
        $is = $this === $object;

        return BoolEnum::fromBool($is);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isNot(self $object): BoolEnum
    {
        $isNot = $this !== $object;

        return BoolEnum::fromBool($isNot);
    }
}
