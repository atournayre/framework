<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Security;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface SecurityInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function user(): UserInterface;
}
