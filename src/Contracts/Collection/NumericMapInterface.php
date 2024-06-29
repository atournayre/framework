<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface NumericMapInterface
{
    /**
     * @param array<string, mixed> $collection
     *
     * @return static
     */
    public static function asMap(array $collection, int $precision);
}
