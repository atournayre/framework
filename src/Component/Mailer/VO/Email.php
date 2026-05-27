<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\VO;

use Atournayre\Common\Collection\Validation\ValidationCollection;
use Atournayre\Component\Mailer\Collection\EmailContactCollection;
use Atournayre\Component\Mailer\Collection\TagCollection;
use Atournayre\Component\Mailer\Types\EmailHtml;
use Atournayre\Component\Mailer\Types\EmailSubject;
use Atournayre\Component\Mailer\Types\EmailText;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Contracts\Types\TypeValidationInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\FileCollection;

class Email implements LoggableInterface, TypeValidationInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    protected function __construct(
        private readonly EmailSubject $subject,
        private readonly EmailContact $from,
        private EmailContactCollection $to,
        private EmailContactCollection $cc,
        private EmailContactCollection $bcc,
        private EmailContactCollection $replyTo,
        private FileCollection $attachments,
        private TagCollection $tags,
        private EmailText $text,
        private EmailHtml $html,
    ) {
    }

    /**
     * @return static
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function create(EmailSubject $subject, EmailContact $from): self
    {
        return new static(
            subject: $subject,
            from: $from,
            to: EmailContactCollection::asList([]),
            cc: EmailContactCollection::asList([]),
            bcc: EmailContactCollection::asList([]),
            replyTo: EmailContactCollection::asList([]),
            attachments: FileCollection::asList([]),
            tags: TagCollection::asMap([]),
            text: EmailText::asNull(),
            html: EmailHtml::asNull(),
        );
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function validate(): ValidationCollection
    {
        return ValidationCollection::asMap([])
            ->set('to', 'validation.email.to.empty', fn () => $this->to->hasNoElement()->isTrue())
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isValid(): BoolEnum
    {
        return $this->validate()->isValid();
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subject(): EmailSubject
    {
        return $this->subject;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function from(): EmailContact
    {
        return $this->from;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function to(): EmailContactCollection
    {
        return $this->to;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function cc(): EmailContactCollection
    {
        return $this->cc;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function bcc(): EmailContactCollection
    {
        return $this->bcc;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function replyTo(): EmailContactCollection
    {
        return $this->replyTo;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function attachments(): FileCollection
    {
        return $this->attachments;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function text(): EmailText
    {
        return $this->text;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function html(): EmailHtml
    {
        return $this->html;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function tags(): TagCollection
    {
        return $this->tags;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withTo(EmailContactCollection $to): self
    {
        $clone = clone $this;
        $clone->to = $to;

        return $clone;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withCc(EmailContactCollection $cc): self
    {
        $clone = clone $this;
        $clone->cc = $cc;

        return $clone;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withBcc(EmailContactCollection $bcc): self
    {
        $clone = clone $this;
        $clone->bcc = $bcc;

        return $clone;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withReplyTo(EmailContactCollection $replyTo): self
    {
        $clone = clone $this;
        $clone->replyTo = $replyTo;

        return $clone;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withAttachments(FileCollection $attachments): self
    {
        $clone = clone $this;
        $clone->attachments = $attachments;

        return $clone;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withText(string $text): self
    {
        $clone = clone $this;
        $clone->text = EmailText::of($text);

        return $clone;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withHtml(string $html): self
    {
        $clone = clone $this;
        $clone->html = EmailHtml::of($html);

        return $clone;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withTags(TagCollection $tags): self
    {
        $clone = clone $this;
        $clone->tags = $tags;

        return $clone;
    }

    /**
     * @return array<string, mixed>
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toLog(): array
    {
        return [
            'subject' => $this->subject->toString(),
            'from' => $this->from->toLog(),
            'to' => $this->to->toLog(),
            'cc' => $this->cc->toLog(),
            'bcc' => $this->bcc->toLog(),
            'replyTo' => $this->replyTo->toLog(),
            'attachments' => $this->attachments->toLog(),
            'text' => $this->text->toString(),
            'html' => $this->html->toString(),
            'tags' => $this->tags->toLog(),
        ];
    }
}
