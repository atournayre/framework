<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Persistance;

use Atournayre\Common\Persistance\Command\DatabaseRemoveCommand;

/**
 * Interface for database remove handlers.
 */
interface DatabaseRemoveHandlerInterface
{
    /**
     * Handles the database remove command.
     */
    public function __invoke(DatabaseRemoveCommand $command): void;
}