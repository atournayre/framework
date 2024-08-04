<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Types;

use Atournayre\Common\Collection\Validation\ValidationCollection;

interface TypeValidationInterface
{
    public function validate(): ValidationCollection;
}
