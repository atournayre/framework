<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Persistance;

use Atournayre\Common\Persistance\Command\DatabaseFlushCommand;

/**
 * Interface for database flush handlers.
 */
interface DatabaseFlushHandlerInterface
{
    /**
     * Handles the database flush command.
     */
    public function __invoke(DatabaseFlushCommand $command): void;
}