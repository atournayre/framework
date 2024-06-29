<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Mailer\Service\Adapter;

use Atournayre\Component\Mailer\Collection\EmailContactCollection;
use Atournayre\Component\Mailer\VO\Email;
use Atournayre\Component\Mailer\VO\EmailContact;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email as SymfonyEmail;

class EmailAdapter
{
    /**
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public static function fromMessage(Email $email): SymfonyEmail
    {
        $email->isValid()->throwIfFalse('Email is not valid.');

        $from = new Address(
            $email->from()->email()->toString(),
            $email->from()->name()->toString()
        );

        $tos = self::collectionToAddresses($email->to());
        $ccs = self::collectionToAddresses($email->cc());
        $bccs = self::collectionToAddresses($email->bcc());
        $replyTos = self::collectionToAddresses($email->replyTo());

        $symfonyEmail = new SymfonyEmail();
        $symfonyEmail->from($from);
        $symfonyEmail->subject($email->subject()->toString());
        $symfonyEmail->text($email->text()->toString());
        $symfonyEmail->html($email->html()->toString());
        $symfonyEmail->to(...$tos);
        $symfonyEmail->cc(...$ccs);
        $symfonyEmail->bcc(...$bccs);
        $symfonyEmail->replyTo(...$replyTos);

        foreach ($email->attachments()->values() as $attachment) {
            $symfonyEmail->attachFromPath($attachment->getPathname()->toString());
        }

        $headers = $symfonyEmail->getHeaders();
        foreach ($email->tags()->values() as $tagName => $tagValue) {
            $headers->addTextHeader($tagName, $tagValue);
        }

        return $symfonyEmail;
    }

    /**
     * @param EmailContactCollection<EmailContact> $emailContactCollection
     *
     * @return array|Address[]
     */
    private static function collectionToAddresses(EmailContactCollection $emailContactCollection): array
    {
        if ($emailContactCollection->hasNoElement()) {
            return [];
        }

        return $emailContactCollection
            ->toMap()
            ->map(static fn (EmailContact $emailContact): Address => new Address(
                $emailContact->email()->toString(),
                $emailContact->name()->toString()
            ))
            ->toArray()
        ;
    }
}
