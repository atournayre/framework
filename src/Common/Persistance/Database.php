<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance;

use Atournayre\Common\Persistance\Command\DatabaseFlushCommand;
use Atournayre\Common\Persistance\Command\DatabasePersistCommand;
use Atournayre\Common\Persistance\Command\DatabaseRemoveCommand;
use Atournayre\Contracts\CommandBus\CommandBusInterface;
use Atournayre\Contracts\Persistance\DatabasePersistenceInterface;

/**
 * Database class provides a simple wrapper around Symfony's MessageBus for database operations.
 *
 * This class implements the DatabasePersistenceInterface and provides methods
 * to persist, flush, and remove objects from the database using command messages.
 *
 * Usage with direct instantiation:
 * ```php
 * $database = Database::new($commandBus, $entity);
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
     * @param CommandBusInterface $commandBus The command bus for dispatching database operations
     * @param object             $object     The object to be managed by the database
     */
    private function __construct(
        private CommandBusInterface $commandBus,
        private object $object,
    ) {
    }

    /**
     * Creates a new Database instance.
     *
     * @param CommandBusInterface $commandBus The command bus for dispatching database operations
     * @param object             $object     The object to be managed by the database
     *
     * @return self A new Database instance
     *
     * @api
     */
    public static function new(
        CommandBusInterface $commandBus,
        object $object,
    ): self {
        return new self(
            commandBus: $commandBus,
            object: $object,
        );
    }

    /**
     * Persists the object to the database.
     *
     * This method dispatches a DatabasePersistCommand to handle the persistence operation.
     *
     * @return self For method chaining
     *
     * @see DatabasePersistCommand
     */
    public function persist(): self
    {
        DatabasePersistCommand::new(object: $this->object)
            ->command(bus: $this->commandBus);

        return $this;
    }

    /**
     * Flushes all changes to the database.
     *
     * This method dispatches a DatabaseFlushCommand to handle the flush operation.
     *
     * @see DatabaseFlushCommand
     */
    public function flush(): void
    {
        DatabaseFlushCommand::new()
            ->command(bus: $this->commandBus);
    }

    /**
     * Removes the object from the database.
     *
     * This method dispatches a DatabaseRemoveCommand to handle the removal operation.
     * The actual DELETE statement will be executed when flush() is called.
     *
     * @return self For method chaining
     *
     * @see DatabaseRemoveCommand
     */
    public function remove(): self
    {
        DatabaseRemoveCommand::new(object: $this->object)
            ->command(bus: $this->commandBus);

        return $this;
    }
}
