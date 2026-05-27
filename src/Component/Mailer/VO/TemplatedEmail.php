<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\VO;

use Atournayre\Common\Collection\TemplateContextCollection;
use Atournayre\Common\Collection\Validation\ValidationCollection;
use Atournayre\Common\Types\HtmlTemplatePath;
use Atournayre\Common\Types\TextTemplatePath;
use Atournayre\Component\Mailer\Collection\EmailContactCollection;
use Atournayre\Component\Mailer\Collection\TagCollection;
use Atournayre\Component\Mailer\Types\EmailHtml;
use Atournayre\Component\Mailer\Types\EmailSubject;
use Atournayre\Component\Mailer\Types\EmailText;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Types\TypeValidationInterface;
use Atournayre\Primitives\Collection\FileCollection;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class TemplatedEmail extends Email implements TypeValidationInterface
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    protected function __construct(
        EmailSubject $subject,
        EmailContact $from,
        EmailContactCollection $to,
        EmailContactCollection $cc,
        EmailContactCollection $bcc,
        EmailContactCollection $replyTo,
        FileCollection $attachments,
        TagCollection $tags,
        EmailText $text,
        EmailHtml $html,
        private HtmlTemplatePath $htmlTemplatePath,
        private TextTemplatePath $textTemplatePath,
        private TemplateContextCollection $templateContextCollection,
    ) {
        parent::__construct(
            subject: $subject,
            from: $from,
            to: $to,
            cc: $cc,
            bcc: $bcc,
            replyTo: $replyTo,
            attachments: $attachments,
            tags: $tags,
            text: $text,
            html: $html,
        );
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function create(
        EmailSubject $subject,
        EmailContact $from,
    ): self {
        return new self(
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
            htmlTemplatePath: HtmlTemplatePath::empty(),
            textTemplatePath: TextTemplatePath::empty(),
            templateContextCollection: TemplateContextCollection::asMap([]),
        );
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function htmlTemplatePath(): HtmlTemplatePath
    {
        return $this->htmlTemplatePath;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function textTemplatePath(): TextTemplatePath
    {
        return $this->textTemplatePath;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function templateContextCollection(): TemplateContextCollection
    {
        return $this->templateContextCollection;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withHtmlTemplatePath(HtmlTemplatePath $htmlTemplatePath): self
    {
        $clone = clone $this;
        $clone->htmlTemplatePath = $htmlTemplatePath;

        return $clone;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withTextTemplatePath(TextTemplatePath $textTemplatePath): self
    {
        $clone = clone $this;
        $clone->textTemplatePath = $textTemplatePath;

        return $clone;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withContext(TemplateContextCollection $templateContextCollection): self
    {
        $clone = clone $this;
        $clone->templateContextCollection = $templateContextCollection;

        return $clone;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function validate(): ValidationCollection
    {
        return ValidationCollection::asMap([])
            ->set(
                'template',
                'validation.templated_email.template.empty',
                fn () => $this->htmlTemplatePath->isEmpty()->isTrue()
                    && $this->textTemplatePath->isEmpty()->isTrue()
            )
        ;
    }
}
