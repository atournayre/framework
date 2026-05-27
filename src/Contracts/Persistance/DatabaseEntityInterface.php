<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Persistance;

/**
 * Interface for entities that can be persisted to a database.
 *
 * Entities implementing this interface must provide a database() method
 * that returns a DatabasePersistenceInterface instance for database operations.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface DatabaseEntityInterface
{
    /**
     * Get a database persistence interface for this entity.
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function database(): DatabasePersistenceInterface;
}
