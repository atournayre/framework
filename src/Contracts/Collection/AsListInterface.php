<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AsListInterface
{
    /**
     * @param array<int, mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asList(array $collection): self;
}
