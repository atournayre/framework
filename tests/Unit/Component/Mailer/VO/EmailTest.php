<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Component\Mailer\VO;

use Atournayre\Component\Mailer\Collection\EmailContactCollection;
use Atournayre\Component\Mailer\Collection\TagCollection;
use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Component\Mailer\Types\EmailName;
use Atournayre\Component\Mailer\Types\EmailSubject;
use Atournayre\Component\Mailer\VO\Email;
use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Primitives\Collection\FileCollection;
use Atournayre\Wrapper\SplFileInfo;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCreateEmailWithEmptySubjectThrowsException(): void
    {
        self::expectException(\Exception::class);
        self::expectExceptionMessage('Email subject cannot be empty.');

        EmailSubject::of('');
    }

    /**
     * @throws \Exception
     */
    public function testValidateEmailWithoutToReturnsError(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = Email::create($subject, $emailContact);

        $errors = $email->validate();

        self::assertArrayHasKey('to', $errors);
        self::assertEquals('validation.email.to.empty', $errors['to']);
    }

    /**
     * @throws \Exception
     */
    public function testIsValidReturnsFalseWhenEmailIsInvalid(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = Email::create($subject, $emailContact);

        self::assertFalse($email->isValid()->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsValidReturnsTrueWhenEmailIsValid(): void
    {
        $subject = EmailSubject::of('Test Subject');

        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $toAddress = EmailAddress::of('test@example.com');
        $toName = EmailName::of('Test');
        $toContact = EmailContact::create($toAddress, $toName);

        $tos = EmailContactCollection::asList([$toContact]);

        $email = Email::create($subject, $emailContact)
            ->withTo($tos)
        ;

        self::assertTrue($email->isValid()->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testWithTextThrowsExceptionWhenTextIsEmpty(): void
    {
        $subject = EmailSubject::of('Test Subject');

        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = Email::create($subject, $emailContact);

        self::expectException(\Exception::class);
        self::expectExceptionMessage('Email text cannot be empty.');

        $email->withText('');
    }

    /**
     * @throws \Exception
     */
    public function testWithHtmlThrowsExceptionWhenHtmlIsEmpty(): void
    {
        $subject = EmailSubject::of('Test Subject');

        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = Email::create($subject, $emailContact);

        self::expectException(\Exception::class);
        self::expectExceptionMessage('Email HTML cannot be empty.');

        $email->withHtml('');
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\Email::from
     *
     * @throws \Exception
     */
    public function testFrom(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = Email::create($subject, $emailContact);

        self::assertSame($emailContact, $email->from());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\Email::to
     *
     * @throws \Exception
     */
    public function testTo(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $to = EmailContactCollection::asList([$emailContact]);

        $email = Email::create($subject, $emailContact)
            ->withTo($to)
        ;

        self::assertSame($emailContact, $email->to()->first());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\Email::cc
     *
     * @throws \Exception
     */
    public function testCc(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $cc = EmailContactCollection::asList([$emailContact]);

        $email = Email::create($subject, $emailContact)
            ->withCc($cc)
        ;

        self::assertSame($emailContact, $email->cc()->first());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\Email::bcc
     *
     * @throws \Exception
     */
    public function testBcc(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $bcc = EmailContactCollection::asList([$emailContact]);

        $email = Email::create($subject, $emailContact)
            ->withBcc($bcc)
        ;

        self::assertSame($emailContact, $email->bcc()->first());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\Email::replyTo
     *
     * @throws \Exception
     */
    public function testReplyTo(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $replyTo = EmailContactCollection::asList([$emailContact]);

        $email = Email::create($subject, $emailContact)
            ->withReplyTo($replyTo)
        ;

        self::assertSame($emailContact, $email->replyTo()->first());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\Email::attachments
     *
     * @throws \Exception
     */
    public function testAttachments(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $splFileInfo = SplFileInfo::of('test.txt', 'test.txt', 'test.txt');
        $attachments = FileCollection::asList([$splFileInfo]);

        $email = Email::create($subject, $emailContact)
            ->withAttachments($attachments)
        ;

        self::assertSame($splFileInfo, $email->attachments()->first());
    }

    /**
     * @covers \Atournayre\Component\Mailer\VO\Email::tags
     *
     * @throws \Exception
     */
    public function testTags(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $tag1 = 'tag1';
        $tags = TagCollection::asMap([$tag1 => $tag1]);

        $email = Email::create($subject, $emailContact)
            ->withTags($tags)
        ;

        self::assertSame($tag1, $email->tags()->first());
    }
}
