<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance;

use Atournayre\Common\Assert\Assert as Assertion;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Persistance\DatabasePersistenceInterface;

/**
 * Trait that provides database persistence functionality.
 *
 * Classes using this trait should implement the DatabaseEntityInterface.
 * This trait provides a database() method that returns a DatabasePersistenceInterface
 * for database operations on the entity.
 */
trait DatabaseTrait
{
    /**
     * Get a database persistence interface for this entity.
     *
     * @throws ThrowableInterface
     */
    public function database(): DatabasePersistenceInterface
    {
        Assertion::notNull($this->dependencyInjection, 'Dependency injection is not available. Did you forget to add the $dependencyInjection property to your class?');
        Assertion::true(isset($this->dependencyInjection->entityManager), 'Entity manager is not available. Did you forget to add the EntityManagerInterface to your dependency injection class?');

        return Database::new(
            entityManager: $this->dependencyInjection->entityManager,
            object: $this,
        );
    }
}
