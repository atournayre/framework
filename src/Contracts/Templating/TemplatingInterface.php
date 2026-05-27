<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Templating;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface TemplatingInterface
{
    /**
     * @param array<string, mixed> $parameters
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function render(string $template, array $parameters = []): string;
}
