<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Json;

interface ToJsonInterface
{
    /**
     * @param array<string, mixed> $options
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function json(array $options = []): string;
}
