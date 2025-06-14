<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance;

use Atournayre\Contracts\Persistance\DatabasePersistenceInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Database class provides a simple wrapper around Doctrine's EntityManager.
 *
 * This class implements the DatabasePersistenceInterface and provides methods
 * to persist, flush, and remove objects from the database.
 *
 * Usage with direct instantiation:
 * ```php
 * $database = Database::new($entityManager, $entity);
 * $database->persist();
 * $database->flush();
 * ```
 *
 * Usage with DatabaseTrait (recommended):
 * ```php
 * $entity = new MyEntity();
 * $entity->setName('Example');
 *
 * $entity->database()->persist();
 * $entity->database()->flush();
 * ```
 *
 * @see DatabasePersistenceInterface
 * @see DatabaseTrait
 */
final readonly class Database implements DatabasePersistenceInterface
{
    /**
     * Private constructor to enforce usage of the factory method.
     *
     * @param EntityManagerInterface $entityManager The Doctrine entity manager
     * @param object                 $object        The object to be managed by the entity manager
     */
    private function __construct(
        private EntityManagerInterface $entityManager,
        private object $object,
    ) {
    }

    /**
     * Creates a new Database instance.
     *
     * @param EntityManagerInterface $entityManager The Doctrine entity manager
     * @param object                 $object        The object to be managed by the entity manager
     *
     * @return self A new Database instance
     *
     * @api
     */
    public static function new(
        EntityManagerInterface $entityManager,
        object $object,
    ): self {
        return new self(
            entityManager: $entityManager,
            object: $object,
        );
    }

    /**
     * Persists the object to the database.
     *
     * This method tells Doctrine to "manage" the object, making it aware of the object
     * without actually executing the SQL INSERT/UPDATE statement.
     *
     * @return self For method chaining
     *
     * @see EntityManagerInterface::persist
     */
    public function persist(): self
    {
        $this->entityManager->persist($this->object);

        return $this;
    }

    /**
     * Flushes all changes to the database.
     *
     * This method executes all SQL statements needed to persist the changes to the database.
     *
     * @see EntityManagerInterface::flush
     */
    public function flush(): void
    {
        $this->entityManager->flush();
    }

    /**
     * Removes the object from the database.
     *
     * This method tells Doctrine to remove the object from the database.
     * The actual DELETE statement will be executed when flush() is called.
     *
     * @return self For method chaining
     *
     * @see EntityManagerInterface::remove
     */
    public function remove(): self
    {
        $this->entityManager->remove($this->object);

        return $this;
    }
}
