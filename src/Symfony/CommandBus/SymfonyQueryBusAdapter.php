<?php

declare(strict_types=1);

namespace Atournayre\Symfony\CommandBus;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\CommandBus\QueryBusInterface;
use Atournayre\Contracts\CommandBus\QueryInterface;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

/**
 * Adapter that bridges Symfony's MessageBus to QueryBusInterface.
 */
final readonly class SymfonyQueryBusAdapter implements QueryBusInterface
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    public function ask(QueryInterface $query): mixed
    {
        try {
            $envelope = $this->messageBus->dispatch($query);

            /** @var HandledStamp|null $handledStamp */
            $handledStamp = $envelope->last(HandledStamp::class);

            return $handledStamp?->getResult();
        } catch (ExceptionInterface $exception) {
            throw RuntimeException::fromThrowable($exception);
        }
    }
}
