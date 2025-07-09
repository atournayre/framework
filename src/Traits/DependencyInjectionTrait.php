<?php

declare(strict_types=1);

namespace Atournayre\Traits;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\DependencyInjection\DependencyInjectionInterface;

/**
 * Trait for dependency injection functionality.
 *
 * This trait provides an implementation of DependencyInjectionAwareInterface
 * that can be used by classes that need dependency injection capabilities.
 *
 * For immutable usage, prefer the withDependencyInjection() method over setDependencyInjection().
 */
trait DependencyInjectionTrait
{
    private ?DependencyInjectionInterface $dependencyInjection = null;

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
    public function withDependencyInjection(DependencyInjectionInterface $dependencyInjection): static
    {
        $clone = clone $this;
        $clone->dependencyInjection = $dependencyInjection;

        return $clone;
    }

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
    public function setDependencyInjection(DependencyInjectionInterface $dependencyInjection): void
    {
        $this->dependencyInjection = $dependencyInjection;
    }

    /**
     * Gets the dependency injection container.
     *
     * @return DependencyInjectionInterface The dependency injection container
     *
     * @throws RuntimeException When dependency injection has not been set
     */
    public function dependencyInjection(): DependencyInjectionInterface
    {
        if (null === $this->dependencyInjection) {
            throw RuntimeException::new('Dependency injection has not been set');
        }

        return $this->dependencyInjection;
    }
}
