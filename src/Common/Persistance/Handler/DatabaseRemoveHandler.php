<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance\Handler;

use Atournayre\Common\Persistance\Command\DatabaseRemoveCommand;
use Atournayre\Contracts\Persistance\DatabaseRemoveHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Handler for DatabaseRemoveCommand.
 */
#[AsMessageHandler]
/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final readonly class DatabaseRemoveHandler implements DatabaseRemoveHandlerInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __invoke(DatabaseRemoveCommand $command): void
    {
        $this->entityManager->remove($command->object());
    }
}
