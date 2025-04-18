<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Component\Mailer\VO;

use Atournayre\Common\Collection\TemplateContextCollection;
use Atournayre\Common\Types\HtmlTemplatePath;
use Atournayre\Common\Types\TextTemplatePath;
use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Component\Mailer\Types\EmailName;
use Atournayre\Component\Mailer\Types\EmailSubject;
use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Component\Mailer\VO\TemplatedEmail;
use Atournayre\Contracts\Exception\ThrowableInterface;
use PHPUnit\Framework\TestCase;

final class TemplatedEmailTest extends TestCase
{
    /**
     * @covers \Atournayre\Component\Mailer\VO\TemplatedEmail::htmlTemplatePath
     *
     * @throws ThrowableInterface
     */
    public function testHtmlTemplatePath(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $htmlTemplatePath = HtmlTemplatePath::of('test.html');

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withHtmlTemplatePath($htmlTemplatePath)
        ;

        self::assertTrue($email->htmlTemplatePath()->equalsTo('test.html')->isTrue());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\TemplatedEmail::textTemplatePath
     *
     * @throws ThrowableInterface
     */
    public function testTextTemplatePath(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $textTemplatePath = TextTemplatePath::of('test.txt');

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withTextTemplatePath($textTemplatePath)
        ;

        self::assertTrue($email->textTemplatePath()->equalsTo('test.txt')->isTrue());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\TemplatedEmail::templateContextCollection
     *
     * @throws ThrowableInterface
     */
    public function testTemplateContextCollection(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $input = [
            'key' => 'value',
            'date' => new \DateTime('204-06-23'),
        ];
        $templateContextCollection = TemplateContextCollection::asMap($input);

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withContext($templateContextCollection)
        ;

        self::assertEquals($input, $email->templateContextCollection()->toArray());
        self::assertTrue($email->templateContextCollection()->has('key')->isTrue());
        self::assertTrue($email->templateContextCollection()->has('date')->isTrue());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\TemplatedEmail::validate
     *
     * @throws ThrowableInterface
     */
    public function testValidateWithHtmlTemplatePath(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $htmlTemplatePath = HtmlTemplatePath::of('test.html');

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withHtmlTemplatePath($htmlTemplatePath)
        ;

        self::assertTrue($email->validate()->isValid()->isTrue());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\TemplatedEmail::validate
     *
     * @throws ThrowableInterface
     */
    public function testValidateWithTextTemplatePath(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $textTemplatePath = TextTemplatePath::of('test.txt');

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withTextTemplatePath($textTemplatePath)
        ;

        self::assertTrue($email->validate()->isValid()->isTrue());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\TemplatedEmail::validate
     *
     * @throws ThrowableInterface
     */
    public function testValidateWithoutTemplate(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = TemplatedEmail::create($subject, $emailContact);

        self::assertTrue($email->validate()->isValid()->isFalse());
        self::assertSame('validation.templated_email.template.empty', $email->validate()->toString());
    }
}
