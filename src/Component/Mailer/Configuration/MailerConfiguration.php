<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Configuration;

use Atournayre\Component\Mailer\Collection\EmailContactCollection;
use Atournayre\Component\Mailer\Types\AttachmentMaxSize;
use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Contracts\Exception\ThrowableInterface;

final class MailerConfiguration
{
    private EmailContact $from;

    private AttachmentMaxSize $attachmentsMaxSize;

    /**
     * @throws ThrowableInterface
     */
    private function __construct(
        private EmailContactCollection $replyTos,
    )
    {
    }

    /**
     * @api
     */
    public static function create(): self
    {
        return new self(
            replyTos: EmailContactCollection::asList([]),
        );
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
     * @throws ThrowableInterface
     *
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
     */
    public function withReplyTos(EmailContactCollection $replyToCollection): self
    {
        $clone = clone $this;
        $clone->replyTos = $replyToCollection;

        return $clone;
    }

    /**
     * @api
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
