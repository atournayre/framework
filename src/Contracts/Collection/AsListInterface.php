<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface AsListInterface
{
    /**
     * @param array<int, mixed> $collection
     *
     * @return static
     */
    public static function asList(array $collection);
}
