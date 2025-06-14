<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Persistance;

/**
 * Interface for entities that can be persisted to a database.
 *
 * Entities implementing this interface must provide a database() method
 * that returns a DatabasePersistenceInterface instance for database operations.
 */
interface DatabaseEntityInterface
{
    /**
     * Get a database persistence interface for this entity.
     */
    public function database(): DatabasePersistenceInterface;
}
