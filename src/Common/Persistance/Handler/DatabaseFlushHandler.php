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
/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final readonly class DatabaseFlushHandler implements DatabaseFlushHandlerInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __invoke(DatabaseFlushCommand $command): void
    {
        $this->entityManager->flush();
    }
}
