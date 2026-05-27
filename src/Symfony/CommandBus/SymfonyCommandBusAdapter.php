<?php

declare(strict_types=1);

namespace Atournayre\Symfony\CommandBus;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\CommandBus\CommandBusInterface;
use Atournayre\Contracts\CommandBus\CommandInterface;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Adapter that bridges Symfony's MessageBus to CommandBusInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final readonly class SymfonyCommandBusAdapter implements CommandBusInterface
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dispatch(CommandInterface $command): void
    {
        try {
            $this->messageBus->dispatch($command);
        } catch (ExceptionInterface $exception) {
            throw RuntimeException::fromThrowable($exception);
        }
    }
}
