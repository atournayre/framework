<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface MapInterface
{
    /**
     * @param array<string, mixed> $collection
     * @throws \InvalidArgumentException
     */
    public static function asMap(array $collection): self;
}
