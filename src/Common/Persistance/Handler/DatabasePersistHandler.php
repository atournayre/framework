<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance\Handler;

use Atournayre\Common\Persistance\Command\DatabasePersistCommand;
use Atournayre\Contracts\Persistance\DatabasePersistHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Handler for DatabasePersistCommand.
 */
#[AsMessageHandler]
final readonly class DatabasePersistHandler implements DatabasePersistHandlerInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function __invoke(DatabasePersistCommand $command): void
    {
        $this->entityManager->persist($command->object());
    }
}
