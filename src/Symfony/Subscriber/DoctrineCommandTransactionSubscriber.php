<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Subscriber;

use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Persistance\AllowFlushInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final readonly class DoctrineCommandTransactionSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private LoggerInterface $logger,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ConsoleEvents::COMMAND => ['startTransaction', 100],
            ConsoleEvents::TERMINATE => ['commitTransaction', -100],
            ConsoleEvents::ERROR => ['rollbackTransaction', 100],
        ];
    }

    public function startTransaction(ConsoleCommandEvent $event): void
    {
        $this->logger->setLoggerIdentifier(self::class);

        $context = $this->contextFromEvent($event);
        if ([] === $context) {
            return;
        }

        $this->logger->start($context);
        $this->entityManager->beginTransaction();
        $this->logger->debug('Transaction started', $context);
    }

    /**
     * @param ConsoleCommandEvent|ConsoleTerminateEvent|ConsoleErrorEvent $event
     *
     * @return array<string, mixed>
     */
    private function contextFromEvent(object $event): array
    {
        $command = $event->getCommand();

        if (!$command instanceof Command) {
            return [];
        }

        if (!$this->isAllowFlushCommand($command)) {
            return [];
        }

        $commandName = $command->getName() ?? 'unknown';
        $context = ['command' => $commandName];

        if ($event instanceof ConsoleTerminateEvent) {
            $context['exitCode'] = $event->getExitCode();
        } elseif ($event instanceof ConsoleErrorEvent) {
            $context['error'] = $event->getError()->getMessage();
        }

        return $context;
    }

    private function isAllowFlushCommand(Command $command): bool
    {
        return $command instanceof AllowFlushInterface;
    }

    /**
     * @throws \Throwable
     */
    public function commitTransaction(ConsoleTerminateEvent $event): void
    {
        $context = $this->contextFromEvent($event);
        if ([] === $context) {
            return;
        }

        try {
            $this->logger->debug('Flushing changes', $context);
            $this->entityManager->flush();
            $this->logger->debug('Committing transaction', $context);
            $this->entityManager->commit();
            $this->logger->success($context);
            $this->logger->end($context);
        } catch (\Throwable $throwable) {
            $this->logger->exception($throwable, $context);
            $this->rollback();
            throw $throwable;
        }
    }

    public function rollbackTransaction(ConsoleErrorEvent $event): void
    {
        $context = $this->contextFromEvent($event);
        if ([] === $context) {
            return;
        }

        $this->logger->error('Rolling back transaction due to error', $context);
        $this->rollback();
        $this->logger->failFast($context);
        $this->logger->end($context);
    }

    private function rollback(): void
    {
        if (!$this->entityManager->getConnection()->isTransactionActive()) {
            return;
        }

        $this->logger->debug('Rolling back transaction');
        $this->entityManager->rollback();
    }
}
