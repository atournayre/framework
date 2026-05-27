<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Log;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface LoggableInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toLog(): array;
}
