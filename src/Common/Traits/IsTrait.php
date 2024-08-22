<?php

declare(strict_types=1);

namespace Atournayre\Common\Traits;

use Atournayre\Primitives\BoolEnum;

trait IsTrait
{
    public function is(self $object): BoolEnum
    {
        $is = $this === $object;

        return BoolEnum::fromBool($is);
    }

    public function isNot(self $object): BoolEnum
    {
        $isNot = $this !== $object;

        return BoolEnum::fromBool($isNot);
    }
}
