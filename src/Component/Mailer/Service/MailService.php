<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Service;

use Atournayre\Component\Mailer\Configuration\MailerConfiguration;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Mailer\SendMailInterface;

final readonly class MailService
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function __construct(
        private LoggerInterface $logger,
        private SendMailInterface $sendMail,
        private MailerConfiguration $mailerConfiguration,
    ) {
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function send($message, $envelope = null): void
    {
        $this->logSendingEmail($message);
        $this->sendMail->send($message, $envelope);
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private function logSendingEmail($message): void
    {
        $logContext = $message instanceof LoggableInterface ? $message->toLog() : [];
        $this->logger->info('Sending email', $logContext);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function configuration(): MailerConfiguration
    {
        return $this->mailerConfiguration;
    }
}
