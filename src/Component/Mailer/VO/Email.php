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
    private EmailContactCollection $to;

    private EmailContactCollection $cc;

    private EmailContactCollection $bcc;

    private EmailContactCollection $replyTo;

    private FileCollection $attachments;

    private TagCollection $tags;

    private EmailText $text;

    private EmailHtml $html;

    private EmailSubject $subject;

    private EmailContact $from;

    protected function __construct(
        EmailSubject $subject,
        EmailContact $from,
    ) {
        $this->from = $from;
        $this->subject = $subject;
        $this->to = EmailContactCollection::asList([]);
        $this->cc = EmailContactCollection::asList([]);
        $this->bcc = EmailContactCollection::asList([]);
        $this->replyTo = EmailContactCollection::asList([]);
        $this->attachments = FileCollection::asList([]);
        $this->tags = TagCollection::asMap([]);
        $this->text = EmailText::asNull();
        $this->html = EmailHtml::asNull();
    }

    /**
     * @api
     *
     * @return static
     */
    public static function create(EmailSubject $subject, EmailContact $from): self
    {
        // @phpstan-ignore-next-line
        return new static($subject, $from);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
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
    public function isValid(): BoolEnum
    {
        return $this->validate()->isValid();
    }

    /**
     * @api
     */
    public function subject(): EmailSubject
    {
        return $this->subject;
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
    public function to(): EmailContactCollection
    {
        return $this->to;
    }

    /**
     * @api
     */
    public function cc(): EmailContactCollection
    {
        return $this->cc;
    }

    /**
     * @api
     */
    public function bcc(): EmailContactCollection
    {
        return $this->bcc;
    }

    /**
     * @api
     */
    public function replyTo(): EmailContactCollection
    {
        return $this->replyTo;
    }

    /**
     * @api
     */
    public function attachments(): FileCollection
    {
        return $this->attachments;
    }

    /**
     * @api
     */
    public function text(): EmailText
    {
        return $this->text;
    }

    /**
     * @api
     */
    public function html(): EmailHtml
    {
        return $this->html;
    }

    /**
     * @api
     */
    public function tags(): TagCollection
    {
        return $this->tags;
    }

    /**
     * @api
     */
    public function withTo(EmailContactCollection $to): self
    {
        $clone = clone $this;
        $clone->to = $to;

        return $clone;
    }

    /**
     * @api
     */
    public function withCc(EmailContactCollection $cc): self
    {
        $clone = clone $this;
        $clone->cc = $cc;

        return $clone;
    }

    /**
     * @api
     */
    public function withBcc(EmailContactCollection $bcc): self
    {
        $clone = clone $this;
        $clone->bcc = $bcc;

        return $clone;
    }

    /**
     * @api
     */
    public function withReplyTo(EmailContactCollection $replyTo): self
    {
        $clone = clone $this;
        $clone->replyTo = $replyTo;

        return $clone;
    }

    /**
     * @api
     */
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
    public function withHtml(string $html): self
    {
        $clone = clone $this;
        $clone->html = EmailHtml::of($html);

        return $clone;
    }

    /**
     * @api
     */
    public function withTags(TagCollection $tags): self
    {
        $clone = clone $this;
        $clone->tags = $tags;

        return $clone;
    }

    /**
     * @return array<string, mixed>
     */
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
