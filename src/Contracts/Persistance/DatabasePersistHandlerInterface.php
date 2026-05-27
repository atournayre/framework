<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Persistance;

use Atournayre\Common\Persistance\Command\DatabasePersistCommand;

/**
 * Interface for database persist handlers.
 */
interface DatabasePersistHandlerInterface
{
    /**
     * Handles the database persist command.
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function __invoke(DatabasePersistCommand $command): void;
}
