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
final readonly class DatabaseRemoveHandler implements DatabaseRemoveHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(DatabaseRemoveCommand $command): void
    {
        $this->entityManager->remove($command->object());
    }
}