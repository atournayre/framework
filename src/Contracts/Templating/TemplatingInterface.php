<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Templating;

interface TemplatingInterface
{
    /**
     * @param array<string, mixed> $parameters
     *
     * @throws \Exception
     */
    public function render(string $template, array $parameters = []): string;
}
