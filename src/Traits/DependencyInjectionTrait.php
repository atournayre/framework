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
 */
trait DependencyInjectionTrait
{
    private ?DependencyInjectionInterface $dependencyInjection = null;

    /**
     * Sets the dependency injection container.
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
