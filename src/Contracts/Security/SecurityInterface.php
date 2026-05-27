<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Security;

interface SecurityInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function user(): UserInterface;
}
