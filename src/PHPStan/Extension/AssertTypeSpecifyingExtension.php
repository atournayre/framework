<?php

declare(strict_types=1);

namespace Atournayre\PHPStan\Extension;

use Atournayre\Common\Assert\Assert;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class AssertTypeSpecifyingExtension extends \PHPStan\Type\WebMozartAssert\AssertTypeSpecifyingExtension
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getClass(): string
    {
        return Assert::class;
    }
}
