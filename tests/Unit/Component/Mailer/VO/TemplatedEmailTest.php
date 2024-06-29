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
use PHPUnit\Framework\TestCase;

final class TemplatedEmailTest extends TestCase
{
    /**
     * @covers \Atournayre\Component\Mailer\VO\TemplatedEmail::htmlTemplatePath
     *
     * @throws \Exception
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
     * @throws \Exception
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
     * @throws \Exception
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
        self::assertTrue($email->templateContextCollection()->offsetExists('key'));
        self::assertTrue($email->templateContextCollection()->offsetExists('date'));
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\TemplatedEmail::validate
     *
     * @throws \Exception
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
     * @throws \Exception
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
     * @throws \Exception
     */
    public function testValidateWithoutTemplate(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = TemplatedEmail::create($subject, $emailContact);

        self::assertTrue($email->validate()->isValid()->isFalse());
    }
}
