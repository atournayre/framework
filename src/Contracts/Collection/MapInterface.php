<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface MapInterface
{
    /**
     * @param array<string, mixed> $collection
     *
     * @return static
     *
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection);
}
