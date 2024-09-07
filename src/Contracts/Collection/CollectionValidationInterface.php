<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface CollectionValidationInterface
{
    /**
     * @throws \InvalidArgumentException
     */
    public function validateCollection(): void;
}
