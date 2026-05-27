<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Context;

interface HasContextInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function hasContext(): bool;
}
