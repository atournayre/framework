<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Routing;

use Atournayre\Contracts\Routing\RoutingInterface;
use Symfony\Component\Routing\RouterInterface;

final readonly class RoutingService implements RoutingInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function __construct(
        private RouterInterface $router,
    ) {
    }

    /**
     * @param array<string, mixed> $parameters
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function generate(string $name, array $parameters = [], int $referenceType = RoutingInterface::ABSOLUTE_PATH): string
    {
        return $this->router->generate($name, $parameters, $referenceType);
    }
}
