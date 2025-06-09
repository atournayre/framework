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
        private LoggerInterface $logger
    ) {
        $this->logger->setLoggerIdentifier(self::class);
    }

    /**
     * @throws \Throwable
     */
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        // Check if any handler implements AllowFlushInterface
        $shouldApplyTransaction = $this->shouldApplyTransaction($envelope);

        $context = $this->messageContext($envelope);

        if ($shouldApplyTransaction) {
            $this->logger->start($context);
            $this->logger->debug('Starting transaction for message', $context);
            $this->entityManager->beginTransaction();
        }

        try {
            $envelope = $stack->next()->handle($envelope, $stack);

            if ($shouldApplyTransaction) {
                $this->logger->debug('Flushing changes', $context);
                $this->entityManager->flush();
                $this->logger->debug('Committing transaction', $context);
                $this->entityManager->commit();
                $this->logger->success($context);
                $this->logger->end($context);
            }

            return $envelope;
        } catch (\Throwable $e) {
            if ($shouldApplyTransaction) {
                $context['exception'] = [
                    'class' => get_class($e),
                    'message' => $e->getMessage(),
                ];
                $this->logger->exception($e, $context);
                $this->rollback();
                $this->logger->failFast($context);
                $this->logger->end($context);
            }
            throw $e;
        }
    }

    /**
     * @param Envelope $envelope
     *
     * @return array<string, string|null>
     */
    private function messageContext(Envelope $envelope): array
    {
        $message = $envelope->getMessage();
        return [
            'message_class' => get_class($message),
            'message_id' => method_exists($message, 'getId') ? $message->getId() : null,
        ];
    }

    private function shouldApplyTransaction(Envelope $envelope): bool
    {
        $handlers = $this->handlersLocator->getHandlers($envelope);

        foreach ($handlers as $handlerDescriptor) {
            $handler = $handlerDescriptor->getHandler();

            // If the handler is a callable array (e.g. [$object, 'method']), check the object
            if (is_array($handler) && isset($handler[0]) && $handler[0] instanceof AllowFlushInterface) {
                return true;
            }

            // If the handler is an object, check it directly
            if ($handler instanceof AllowFlushInterface) {
                return true;
            }
        }

        return false;
    }

    private function rollback(): void
    {
        if ($this->entityManager->getConnection()->isTransactionActive()) {
            $this->logger->debug('Rolling back transaction');
            $this->entityManager->rollback();
        }
    }
}
