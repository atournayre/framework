<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Component\Mailer\Types;

use Atournayre\Component\Mailer\Types\EmailAddress;
use PHPUnit\Framework\TestCase;

final class EmailAddressTest extends TestCase
{
    public function testEmailAddress(): void
    {
        $email = 'a@example.com';
        $emailAddress = EmailAddress::of($email);
        self::assertSame($email, $emailAddress->toString());
    }

    public function testEmailAddressEmpty(): void
    {
        $email = '';
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('Expected a value to be a valid e-mail address. Got: ""');
        EmailAddress::of($email);
    }

    public function testEmailAddressInvalid(): void
    {
        $email = 'a@a';
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('Expected a value to be a valid e-mail address. Got: "a@a"');
        EmailAddress::of($email);
    }

    public function testUsername(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::of($email);
        self::assertTrue($emailAddress->username()->equalsTo('username')->isTrue());
    }

    public function testDomain(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::of($email);
        self::assertTrue($emailAddress->domain()->equalsTo('domain.com')->isTrue());
    }

    public function testUsernameIs(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::of($email);
        self::assertTrue($emailAddress->usernameIs('username')->isTrue());
    }

    public function testUsernameIsNot(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::of($email);
        self::assertFalse($emailAddress->usernameIs('notusername')->isTrue());
    }

    public function testDomainIs(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::of($email);
        self::assertTrue($emailAddress->domainIs('domain.com')->isTrue());
    }

    public function testDomainIsNot(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::of($email);
        self::assertFalse($emailAddress->domainIs('example.com')->isTrue());
    }

    public function testSameness(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::of($email);
        self::assertTrue($emailAddress->is($email)->isTrue());

        $email2 = EmailAddress::of($email);
        self::assertTrue($emailAddress->is($email2)->isTrue());
    }

    public function testCanonical(): void
    {
        $email = 'a+b@a.com';
        $emailAddress = EmailAddress::of($email);
        self::assertSame('a@a.com', $emailAddress->toCanonical()->toString());

        $email = 'a@a.com';
        $emailAddress = EmailAddress::of($email);
        self::assertSame('a@a.com', $emailAddress->toCanonical()->toString());

        $email = 'a+@a.com';
        $emailAddress = EmailAddress::of($email);
        self::assertSame('a@a.com', $emailAddress->toCanonical()->toString());

        $email = 'a+long-string_with.dot@a.com';
        $emailAddress = EmailAddress::of($email);
        self::assertSame('a@a.com', $emailAddress->toCanonical()->toString());
    }
}
