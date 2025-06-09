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

final class DoctrineTransactionSubscriber implements EventSubscriberInterface
{
    private bool $isAllowFlushController = false;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly LoggerInterface $logger,
    ) {
        $this->logger->setLoggerIdentifier(self::class);
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
        if (!$event->isMainRequest()) {
            return;
        }

        $controller = $event->getController();
        $context = $this->controllerContext($controller);

        // If controller is an array, it's [ControllerClass, methodName]
        if (is_array($controller) && isset($controller[0])) {
            $controllerInstance = $controller[0];

            // Check if controller implements AllowFlushInterface
            $this->isAllowFlushController = $controllerInstance instanceof AllowFlushInterface;

            // Only start transaction if controller implements AllowFlushInterface
            if ($this->isAllowFlushController) {
                $this->logger->start($context);
                $this->entityManager->beginTransaction();
                $this->logger->debug('Transaction started', $context);
            }
        }
    }

    /**
     * @return array<string, string>
     */
    private function controllerContext($controller): array
    {
        if (is_array($controller) && isset($controller[0], $controller[1])) {
            $controllerClass = $controller[0]::class;
            $method = $controller[1];

            return [
                'controller' => $controllerClass,
                'method' => $method,
            ];
        }

        return ['controller' => 'unknown'];
    }

    public function commitTransaction(ResponseEvent $event): void
    {
        if (!$event->isMainRequest() || !$this->isAllowFlushController) {
            return;
        }

        $controller = $event->getRequest()->attributes->get('_controller');
        $context = $this->controllerContext(is_array($controller) ? $controller : [$controller]);
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

    public function rollbackTransaction(ExceptionEvent $event): void
    {
        if (!$event->isMainRequest() || !$this->isAllowFlushController) {
            return;
        }

        $controller = $event->getRequest()->attributes->get('_controller');
        $context = $this->controllerContext(is_array($controller) ? $controller : [$controller]);
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
        if ($this->entityManager->getConnection()->isTransactionActive()) {
            $this->logger->debug('Rolling back transaction');
            $this->entityManager->rollback();
        }
    }
}
