<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface NumericListInterface
{
    /**
     * @param array<int, mixed> $collection
     *
     * @return static
     */
    public static function asList(array $collection, int $precision);
}
