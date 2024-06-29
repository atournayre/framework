<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface ListInterface
{
    /**
     * @param array<int, mixed> $collection
     * @throws \InvalidArgumentException
     */
    public static function asList(array $collection): self;
}
