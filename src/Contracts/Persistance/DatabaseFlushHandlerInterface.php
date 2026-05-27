<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Persistance;

use Atournayre\Common\Persistance\Command\DatabaseFlushCommand;

/**
 * Interface for database flush handlers.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface DatabaseFlushHandlerInterface
{
    /**
     * Handles the database flush command.
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __invoke(DatabaseFlushCommand $command): void;
}
