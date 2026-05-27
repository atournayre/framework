<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Json;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface ToJsonInterface
{
    /**
     * @param array<string, mixed> $options
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function json(array $options = []): string;
}
