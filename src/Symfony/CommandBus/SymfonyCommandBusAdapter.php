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
 */
final readonly class SymfonyCommandBusAdapter implements CommandBusInterface
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    public function dispatch(CommandInterface $command): void
    {
        try {
            $this->messageBus->dispatch($command);
        } catch (ExceptionInterface $exception) {
            throw RuntimeException::fromThrowable($exception);
        }
    }
}
