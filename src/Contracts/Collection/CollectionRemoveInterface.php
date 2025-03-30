<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface CollectionRemoveInterface
{
    public function remove(mixed $element): void;
}
