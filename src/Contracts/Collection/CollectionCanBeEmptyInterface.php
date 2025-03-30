<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface CollectionCanBeEmptyInterface
{
    public static function empty(): self;
}
