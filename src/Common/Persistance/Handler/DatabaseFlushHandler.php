<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance\Handler;

use Atournayre\Common\Persistance\Command\DatabaseFlushCommand;
use Atournayre\Contracts\Persistance\DatabaseFlushHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Handler for DatabaseFlushCommand.
 */
#[AsMessageHandler]
final readonly class DatabaseFlushHandler implements DatabaseFlushHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(DatabaseFlushCommand $command): void
    {
        $this->entityManager->flush();
    }
}