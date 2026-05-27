<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Configuration;

use Atournayre\Component\Mailer\Collection\EmailContactCollection;
use Atournayre\Component\Mailer\Types\AttachmentMaxSize;
use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class MailerConfiguration
{
    private EmailContact $from;

    private AttachmentMaxSize $attachmentsMaxSize;

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(
        private EmailContactCollection $replyTos,
    ) {
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function create(): self
    {
        return new self(
            replyTos: EmailContactCollection::asList([]),
        );
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withFrom(EmailContact $from): self
    {
        $clone = clone $this;
        $clone->from = $from;

        return $clone;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function from(): EmailContact
    {
        return $this->from;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withReplyTos(EmailContactCollection $replyToCollection): self
    {
        $clone = clone $this;
        $clone->replyTos = $replyToCollection;

        return $clone;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function replyTos(): EmailContactCollection
    {
        return $this->replyTos;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withAttachmentsMaxSize(AttachmentMaxSize $attachmentsMaxSize): self
    {
        $clone = clone $this;
        $clone->attachmentsMaxSize = $attachmentsMaxSize;

        return $clone;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function attachmentsMaxSize(): AttachmentMaxSize
    {
        return $this->attachmentsMaxSize;
    }
}
