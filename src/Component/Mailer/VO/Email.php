<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\VO;

use Atournayre\Common\Collection\Validation\ValidationCollection;
use Atournayre\Component\Mailer\Collection\EmailContactCollection;
use Atournayre\Component\Mailer\Collection\TagCollection;
use Atournayre\Component\Mailer\Types\EmailHtml;
use Atournayre\Component\Mailer\Types\EmailSubject;
use Atournayre\Component\Mailer\Types\EmailText;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\FileCollection;
use Symfony\Component\Finder\SplFileInfo;

class Email implements LoggableInterface
{
    /**
     * @var EmailContactCollection<EmailContact>
     */
    private EmailContactCollection $to;

    /**
     * @var EmailContactCollection<EmailContact>
     */
    private EmailContactCollection $cc;

    /**
     * @var EmailContactCollection<EmailContact>
     */
    private EmailContactCollection $bcc;

    /**
     * @var EmailContactCollection<EmailContact>
     */
    private EmailContactCollection $replyTo;

    /**
     * @var FileCollection<SplFileInfo>
     */
    private FileCollection $attachments;

    private TagCollection $tags;

    private EmailText $text;

    private EmailHtml $html;

    private EmailSubject $subject;

    private EmailContact $from;

    protected function __construct(
        EmailSubject $subject,
        EmailContact $from
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
     *
     * @throws \Exception
     */
    public static function create(EmailSubject $subject, EmailContact $from): self
    {
        // @phpstan-ignore-next-line
        return new static($subject, $from);
    }

    /**
     * @api
     */
    public function validate(): ValidationCollection
    {
        return ValidationCollection::asMap([])
            ->set('to', 'validation.email.to.empty', fn () => $this->to->hasNoElement()->isTrue())
        ;
    }

    /**
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
     *
     * @return EmailContactCollection<EmailContact>
     */
    public function to(): EmailContactCollection
    {
        return $this->to;
    }

    /**
     * @api
     *
     * @return EmailContactCollection<EmailContact>
     */
    public function cc(): EmailContactCollection
    {
        return $this->cc;
    }

    /**
     * @api
     *
     * @return EmailContactCollection<EmailContact>
     */
    public function bcc(): EmailContactCollection
    {
        return $this->bcc;
    }

    /**
     * @api
     *
     * @return EmailContactCollection<EmailContact>
     */
    public function replyTo(): EmailContactCollection
    {
        return $this->replyTo;
    }

    /**
     * @api
     *
     * @return FileCollection<SplFileInfo>
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
     *
     * @param EmailContactCollection<EmailContact> $to
     */
    public function withTo(EmailContactCollection $to): self
    {
        $clone = clone $this;
        $clone->to = $to;

        return $clone;
    }

    /**
     * @api
     *
     * @param EmailContactCollection<EmailContact> $cc
     */
    public function withCc(EmailContactCollection $cc): self
    {
        $clone = clone $this;
        $clone->cc = $cc;

        return $clone;
    }

    /**
     * @api
     *
     * @param EmailContactCollection<EmailContact> $bcc
     */
    public function withBcc(EmailContactCollection $bcc): self
    {
        $clone = clone $this;
        $clone->bcc = $bcc;

        return $clone;
    }

    /**
     * @api
     *
     * @param EmailContactCollection<EmailContact> $replyTo
     */
    public function withReplyTo(EmailContactCollection $replyTo): self
    {
        $clone = clone $this;
        $clone->replyTo = $replyTo;

        return $clone;
    }

    /**
     * @api
     *
     * @param FileCollection<SplFileInfo> $attachments
     */
    public function withAttachments(FileCollection $attachments): self
    {
        $clone = clone $this;
        $clone->attachments = $attachments;

        return $clone;
    }

    /**
     * @api
     *
     * @throws \Exception
     */
    public function withText(string $text): self
    {
        $clone = clone $this;
        $clone->text = EmailText::of($text);

        return $clone;
    }

    /**
     * @api
     *
     * @throws \Exception
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
