<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Session;

use Atournayre\Contracts\Session\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface as SymfonyFlashBagInterface;

/**
 * Update config/services.yaml:
 * services:
 *     Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface:
 *         class: Symfony\Component\HttpFoundation\Session\Flash\FlashBag
 *         public: true
 */
final readonly class FlashBagService implements FlashBagInterface
{

    public function __construct(
        private SymfonyFlashBagInterface $symfonyFlashBag,
    ) {
    }

    /**
     * @param string|array<string> $message
     */
    public function success($message): void
    {
        $this->displayMessages(FlashBagInterface::SUCCESS, $message);
    }

    /**
     * @param string|array<string> $message
     */
    public function warning($message): void
    {
        $this->displayMessages(FlashBagInterface::WARNING, $message);
    }

    /**
     * @param string|array<string> $message
     */
    public function error($message): void
    {
        $this->displayMessages(FlashBagInterface::ERROR, $message);
    }

    /**
     * @param string|array<string> $message
     */
    public function info($message): void
    {
        $this->displayMessages(FlashBagInterface::INFO, $message);
    }

    public function fromException(\Exception $exception): void
    {
        $this->error($exception->getMessage());
    }

    /**
     * @param string|array<string> $message
     */
    private function displayMessages(string $type, $message): void
    {
        $messages = is_string($message) ? [$message] : $message;

        foreach ($messages as $flashBagMessage) {
            $this->symfonyFlashBag->add($type, $flashBagMessage);
        }
    }
}
