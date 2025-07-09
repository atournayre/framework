<?php

declare(strict_types=1);

namespace Atournayre\Contracts\DependencyInjection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface for objects that can receive dependency injection.
 *
 * Objects implementing this interface can have dependencies injected
 * and can access the dependency injection container.
 *
 * For immutable usage, prefer the withDependencyInjection() method over setDependencyInjection().
 */
interface DependencyInjectionAwareInterface
{
    /**
     * Returns a new instance with the dependency injection container set.
     *
     * This method follows immutability principles by returning a new instance
     * instead of modifying the current one.
     *
     * @param DependencyInjectionInterface $dependencyInjection The dependency injection container
     *
     * @return static A new instance with the dependency injection container set
     */
    public function withDependencyInjection(DependencyInjectionInterface $dependencyInjection): static;

    /**
     * Sets the dependency injection container.
     *
     * This method modifies the current instance and is primarily used by the framework
     * for scenarios like Doctrine PostLoad events where entity instances cannot be replaced.
     *
     * For application code that follows immutable patterns, prefer withDependencyInjection().
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
