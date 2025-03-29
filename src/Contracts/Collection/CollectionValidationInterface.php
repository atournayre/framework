<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface CollectionValidationInterface
{
    /**
     * @throws ThrowableInterface
     */
    public function validateCollection(): void;
}
