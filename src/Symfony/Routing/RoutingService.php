<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Routing;

use Atournayre\Contracts\Routing\RoutingInterface;
use Symfony\Component\Routing\RouterInterface;

final class RoutingService implements RoutingInterface
{
    public function __construct(
        private RouterInterface $router,
    ) {
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public function generate(string $name, array $parameters = [], int $referenceType = RoutingInterface::ABSOLUTE_PATH): string
    {
        return $this->router->generate($name, $parameters, $referenceType);
    }
}
