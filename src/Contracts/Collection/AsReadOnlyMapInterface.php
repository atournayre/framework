<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface AsReadOnlyMapInterface
{
    /**
     * @param array<string, mixed> $collection
     *
     * @return static
     */
    public static function asReadOnlyMap(array $collection);
}
