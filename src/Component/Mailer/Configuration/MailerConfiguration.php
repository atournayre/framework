<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Configuration;

use Atournayre\Component\Mailer\Collection\EmailContactCollection;
use Atournayre\Component\Mailer\Types\AttachmentMaxSize;
use Atournayre\Component\Mailer\VO\EmailContact;

final class MailerConfiguration
{
    private EmailContact $from;

    /**
     * @var EmailContactCollection<EmailContact>
     */
    private EmailContactCollection $replyTos;

    private AttachmentMaxSize $attachmentsMaxSize;

    private function __construct()
    {
        $this->replyTos = EmailContactCollection::asList([]);
    }

    /**
     * @api
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @api
     */
    public function withFrom(EmailContact $from): self
    {
        $clone = clone $this;
        $clone->from = $from;

        return $clone;
    }

    /**
     * @api
     */
    public function from(): EmailContact
    {
        return $this->from;
    }

    /**
     * @api
     */
    public function withReplyTo(EmailContact $replyToAddress): self
    {
        $clone = clone $this;
        $clone->replyTos = $this->replyTos
            ->add($replyToAddress)
        ;

        return $clone;
    }

    /**
     * @api
     *
     * @param EmailContactCollection<EmailContact> $replyToCollection
     */
    public function withReplyTos(EmailContactCollection $replyToCollection): self
    {
        $clone = clone $this;
        $clone->replyTos = $replyToCollection;

        return $clone;
    }

    /**
     * @api
     *
     * @return EmailContactCollection<EmailContact>
     */
    public function replyTos(): EmailContactCollection
    {
        return $this->replyTos;
    }

    /**
     * @api
     */
    public function withAttachmentsMaxSize(AttachmentMaxSize $attachmentsMaxSize): self
    {
        $clone = clone $this;
        $clone->attachmentsMaxSize = $attachmentsMaxSize;

        return $clone;
    }

    /**
     * @api
     */
    public function attachmentsMaxSize(): AttachmentMaxSize
    {
        return $this->attachmentsMaxSize;
    }
}
