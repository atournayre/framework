<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Persistance;

use Atournayre\Common\Persistance\Command\DatabaseRemoveCommand;

/**
 * Interface for database remove handlers.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface DatabaseRemoveHandlerInterface
{
    /**
     * Handles the database remove command.
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __invoke(DatabaseRemoveCommand $command): void;
}
