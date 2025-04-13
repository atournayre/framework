<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface AsReadOnlyListInterface
{
    /**
     * @param array<int, mixed> $collection
     *
     * @return static
     */
    public static function asReadOnlyList(array $collection);
}
