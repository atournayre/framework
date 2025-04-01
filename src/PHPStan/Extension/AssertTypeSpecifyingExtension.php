<?php

declare(strict_types=1);

namespace Atournayre\PHPStan\Extension;

use Atournayre\Common\Assert\Assert;

final class AssertTypeSpecifyingExtension extends \PHPStan\Type\WebMozartAssert\AssertTypeSpecifyingExtension
{
    public function getClass(): string
    {
        return Assert::class;
    }
}
