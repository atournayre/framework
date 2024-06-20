<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Context;

interface HasContextInterface
{
    public function hasContext(): bool;
}
