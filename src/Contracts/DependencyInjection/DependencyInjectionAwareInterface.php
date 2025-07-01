<?php

declare(strict_types=1);

namespace Atournayre\Contracts\DependencyInjection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface for objects that can receive dependency injection.
 *
 * Objects implementing this interface can have dependencies injected
 * and can access the dependency injection container.
 */
interface DependencyInjectionAwareInterface
{
    /**
     * Sets the dependency injection container.
     *
     * @param DependencyInjectionInterface $dependencyInjection The dependency injection container
     */
    public function setDependencyInjection(DependencyInjectionInterface $dependencyInjection): void;

    /**
     * Gets the dependency injection container.
     *
     * @return DependencyInjectionInterface The dependency injection container
     *
     * @throws ThrowableInterface When dependency injection has not been set
     */
    public function dependencyInjection(): DependencyInjectionInterface;
}
