<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Mailer\Service;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Component\Mailer\VO\Email;
use Atournayre\Component\Mailer\VO\TemplatedEmail;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Mailer\SendMailInterface;
use Atournayre\Symfony\Mailer\Adapter\EmailAdapter;
use Atournayre\Symfony\Mailer\Adapter\TemplatedEmailAdapter;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\RawMessage;

final readonly class SendMailService implements SendMailInterface
{

    public function __construct(
        private MailerInterface $mailer,
    ) {
    }

    /**
     * @param Email|TemplatedEmail $message
     *
     * @throws ThrowableInterface
     */
    // @phpstan-ignore-next-line
    public function send($message, $envelope = null): void
    {
        try {
            $message = $this->adaptMessage($message);

            $this->mailer->send($message, $envelope);
        } catch (\Exception|TransportExceptionInterface $exception) {
            RuntimeException::fromThrowable($exception)->throw();
        }
    }

    /**
     * @param Email|TemplatedEmail $message
     *
     * @throws ThrowableInterface
     */
    private function adaptMessage($message): RawMessage
    {
        if ($message instanceof TemplatedEmail) {
            return TemplatedEmailAdapter::fromMessage($message);
        }

        return EmailAdapter::fromMessage($message);
    }
}
