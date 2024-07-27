<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Mailer\Adapter;

use Atournayre\Component\Mailer\VO\Email;
use Atournayre\Component\Mailer\VO\TemplatedEmail;
use Symfony\Bridge\Twig\Mime\TemplatedEmail as SymfonyTemplatedEmail;

final class TemplatedEmailAdapter extends EmailAdapter
{
    /**
     * @param TemplatedEmail|Email $email
     *
     * @throws \Exception
     */
    public static function fromMessage($email): SymfonyTemplatedEmail
    {
        $symfonyEmail = parent::fromMessage($email);

        $templatedEmail = new SymfonyTemplatedEmail();
        $templatedEmail->subject($symfonyEmail->getSubject());
        $templatedEmail->from(...$symfonyEmail->getFrom());
        $templatedEmail->to(...$symfonyEmail->getTo());
        $templatedEmail->cc(...$symfonyEmail->getCc());
        $templatedEmail->bcc(...$symfonyEmail->getBcc());
        $templatedEmail->replyTo(...$symfonyEmail->getReplyTo());

        foreach ($email->attachments()->toArray() as $attachment) {
            $templatedEmail->attachFromPath($attachment->getPathname()->toString());
        }

        $headers = $templatedEmail->getHeaders();
        foreach ($email->tags()->toArray() as $tagName => $tagValue) {
            $headers->addTextHeader($tagName, $tagValue);
        }

        if ($email instanceof TemplatedEmail) {
            $templatedEmail->htmlTemplate($email->htmlTemplatePath()->toString());
            $templatedEmail->textTemplate($email->textTemplatePath()->toString());
            $templatedEmail->context($email->templateContextCollection()->toArray());
        }

        return $templatedEmail;
    }
}
