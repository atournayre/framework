<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\VO;

use Atournayre\Common\Collection\TemplateContextCollection;
use Atournayre\Common\Collection\Validation\ValidationCollection;
use Atournayre\Common\Types\HtmlTemplatePath;
use Atournayre\Common\Types\TextTemplatePath;
use Atournayre\Component\Mailer\Types\EmailSubject;

final class TemplatedEmail extends Email
{
    public HtmlTemplatePath $htmlTemplatePath;

    public TextTemplatePath $textTemplatePath;

    public TemplateContextCollection $templateContextCollection;

    protected function __construct(
        EmailSubject $subject,
        EmailContact $from
    ) {
        parent::__construct($subject, $from);
        $this->htmlTemplatePath = HtmlTemplatePath::empty();
        $this->textTemplatePath = TextTemplatePath::empty();
        $this->templateContextCollection = TemplateContextCollection::asMap([]);
    }

    /**
     * @api
     */
    public function htmlTemplatePath(): HtmlTemplatePath
    {
        return $this->htmlTemplatePath;
    }

    /**
     * @api
     */
    public function textTemplatePath(): TextTemplatePath
    {
        return $this->textTemplatePath;
    }

    /**
     * @api
     */
    public function templateContextCollection(): TemplateContextCollection
    {
        return $this->templateContextCollection;
    }

    /**
     * @api
     */
    public function withHtmlTemplatePath(HtmlTemplatePath $htmlTemplatePath): self
    {
        $clone = clone $this;
        $clone->htmlTemplatePath = $htmlTemplatePath;

        return $clone;
    }

    /**
     * @api
     */
    public function withTextTemplatePath(TextTemplatePath $textTemplatePath): self
    {
        $clone = clone $this;
        $clone->textTemplatePath = $textTemplatePath;

        return $clone;
    }

    /**
     * @api
     */
    public function withContext(TemplateContextCollection $templateContextCollection): self
    {
        $clone = clone $this;
        $clone->templateContextCollection = $templateContextCollection;

        return $clone;
    }

    /**
     * @throws \Exception
     *
     * @api
     */
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
