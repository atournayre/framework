<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AsReadOnlyMapInterface
{
    /**
     * @param array<string, mixed> $collection
     *
     * * @throws ThrowableInterface
     */
    public static function asReadOnlyMap(array $collection): self;
}
