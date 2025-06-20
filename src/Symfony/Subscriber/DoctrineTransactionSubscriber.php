<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Subscriber;

use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Persistance\AllowFlushInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final readonly class DoctrineTransactionSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private LoggerInterface $logger,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => ['startTransaction', 100],
            KernelEvents::RESPONSE => ['commitTransaction', -100],
            KernelEvents::EXCEPTION => ['rollbackTransaction', 100],
        ];
    }

    public function startTransaction(ControllerEvent $event): void
    {
        $this->logger->setLoggerIdentifier(self::class);

        if (!$event->isMainRequest()) {
            return;
        }

        $controller = $event->getController();
        if (!is_array($controller) || !isset($controller[0])) {
            return;
        }

        $controllerInstance = $controller[0];
        if (!$this->isAllowFlushController($controllerInstance)) {
            return;
        }

        $context = $this->controllerContext($controller);
        $this->logger->start($context);
        $this->entityManager->beginTransaction();
        $this->logger->debug('Transaction started', $context);
    }

    private function isAllowFlushController(object $controller): bool
    {
        return $controller instanceof AllowFlushInterface;
    }

    /**
     * @param array<mixed>|mixed $controller
     *
     * @return array<string, string>
     */
    private function controllerContext(mixed $controller): array
    {
        if (!is_array($controller) || !isset($controller[0], $controller[1])) {
            return ['controller' => 'unknown'];
        }

        return [
            'controller' => $controller[0]::class,
            'method' => $controller[1],
        ];
    }

    /**
     * @throws \Throwable
     */
    public function commitTransaction(ResponseEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $controller = $event->getRequest()->attributes->get('_controller');
        if (!$this->isValidTransactionController($controller)) {
            return;
        }

        $context = $this->controllerContext($controller);
        $context['status_code'] = $event->getResponse()->getStatusCode();

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

    private function isValidTransactionController(mixed $controller): bool
    {
        return is_array($controller) && isset($controller[0]) && $this->isAllowFlushController($controller[0]);
    }

    public function rollbackTransaction(ExceptionEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $controller = $event->getRequest()->attributes->get('_controller');
        if (!$this->isValidTransactionController($controller)) {
            return;
        }

        $context = $this->controllerContext($controller);
        $context['exception'] = [
            'class' => $event->getThrowable()::class,
            'message' => $event->getThrowable()->getMessage(),
        ];

        $this->logger->error('Rolling back transaction due to exception', $context);
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
