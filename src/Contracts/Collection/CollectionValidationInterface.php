<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface CollectionValidationInterface
{
    public function validateCollection(): void;
}
