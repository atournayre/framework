<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Service;

use Atournayre\Component\Mailer\Configuration\MailerConfiguration;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Mailer\SendMailInterface;

final class MailService
{
    private LoggerInterface $logger;

    private SendMailInterface $sendMail;

    private MailerConfiguration $mailerConfiguration;

    public function __construct(
        LoggerInterface $logger,
        SendMailInterface $sendMail,
        MailerConfiguration $mailerConfiguration,
    ) {
        $this->logger = $logger;
        $this->sendMail = $sendMail;
        $this->mailerConfiguration = $mailerConfiguration;
    }

    /**
     * @throws ThrowableInterface
     * @api
     */
    // @phpstan-ignore-next-line
    public function send($message, $envelope = null): void
    {
        $this->logSendingEmail($message);
        $this->sendMail->send($message, $envelope);
    }

    // @phpstan-ignore-next-line
    private function logSendingEmail($message): void
    {
        $logContext = $message instanceof LoggableInterface ? $message->toLog() : [];
        $this->logger->info('Sending email', $logContext);
    }

    /**
     * @api
     */
    public function configuration(): MailerConfiguration
    {
        return $this->mailerConfiguration;
    }
}
