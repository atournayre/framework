<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Json;

interface ToJsonInterface
{
    /**
     * @param array<string, mixed> $options
     */
    public function json(array $options = []): string;
}
