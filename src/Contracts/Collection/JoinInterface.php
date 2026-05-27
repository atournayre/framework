<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface JoinInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface JoinInterface
{
    /**
     * Returns concatenated elements as string with separator.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function join(string $glue = ''): string;
}
