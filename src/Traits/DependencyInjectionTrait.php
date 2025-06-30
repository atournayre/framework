<?php

declare(strict_types=1);

namespace Atournayre\Traits;

use Atournayre\Contracts\DependencyInjection\DependencyInjectionInterface;
use Atournayre\Common\Exception\RuntimeException;

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
     *
     * @return void
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
        if ($this->dependencyInjection === null) {
            throw RuntimeException::new('Dependency injection has not been set');
        }

        return $this->dependencyInjection;
    }
}
