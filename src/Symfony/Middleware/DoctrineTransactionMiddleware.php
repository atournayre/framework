<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Middleware;

use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Persistance\AllowFlushInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Handler\HandlersLocatorInterface;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

final readonly class DoctrineTransactionMiddleware implements MiddlewareInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private HandlersLocatorInterface $handlersLocator,
        private LoggerInterface $logger,
    ) {
    }

    /**
     * @throws \Throwable
     */
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $this->logger->setLoggerIdentifier(self::class);

        // Early return path - no transaction needed
        $shouldApplyTransaction = $this->shouldApplyTransaction($envelope);
        if (!$shouldApplyTransaction) {
            return $stack->next()->handle($envelope, $stack);
        }

        // Transaction path
        $context = $this->messageContext($envelope);
        $this->logger->start($context);
        $this->logger->debug('Starting transaction for message', $context);
        $this->entityManager->beginTransaction();

        try {
            $envelope = $stack->next()->handle($envelope, $stack);

            $this->logger->debug('Flushing changes', $context);
            $this->entityManager->flush();
            $this->logger->debug('Committing transaction', $context);
            $this->entityManager->commit();
            $this->logger->success($context);
            $this->logger->end($context);

            return $envelope;
        } catch (\Throwable $throwable) {
            $context['exception'] = [
                'class' => $throwable::class,
                'message' => $throwable->getMessage(),
            ];
            $this->logger->exception($throwable, $context);
            $this->rollback();
            $this->logger->failFast($context);
            $this->logger->end($context);

            throw $throwable;
        }
    }

    /**
     * @return array<string, string|null>
     */
    private function messageContext(Envelope $envelope): array
    {
        $message = $envelope->getMessage();

        return [
            'message_class' => $message::class,
            'message_id' => method_exists($message, 'getId') ? $message->getId() : null,
        ];
    }

    private function shouldApplyTransaction(Envelope $envelope): bool
    {
        $handlers = $this->handlersLocator->getHandlers($envelope);

        foreach ($handlers as $handlerDescriptor) {
            $handler = $handlerDescriptor->getHandler();

            // Early return if handler is a callable array with an object implementing AllowFlushInterface
            if (is_array($handler) && isset($handler[0]) && $handler[0] instanceof AllowFlushInterface) {
                return true;
            }

            // Early return if handler is an object implementing AllowFlushInterface
            if ($handler instanceof AllowFlushInterface) {
                return true;
            }
        }

        return false;
    }

    private function rollback(): void
    {
        // Early return if no active transaction
        if (!$this->entityManager->getConnection()->isTransactionActive()) {
            return;
        }

        $this->logger->debug('Rolling back transaction');
        $this->entityManager->rollback();
    }
}
