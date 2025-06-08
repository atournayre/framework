<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\TryCatch;

use Atournayre\Tests\Fixtures\TryCatch\CreateUserTryCatch;
use Atournayre\Tests\Fixtures\TryCatch\CreateUserUsingHandlersTryCatch;
use Atournayre\Tests\Fixtures\User;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class ExampleTest extends TestCase
{
    private NullLogger $logger;

    protected function setUp(): void
    {
        $this->logger = new NullLogger();
    }

    public function testCreateUserTryCatchWithValidEmail(): void
    {
        $validEmailTryCatch = CreateUserTryCatch::new(
            'john.doe@example.com',
            'John Doe',
            $this->logger
        );

        $user = $validEmailTryCatch->execute();

        self::assertInstanceOf(User::class, $user);
        self::assertSame('john.doe@example.com', $user->getEmail());
        self::assertSame('John Doe', $user->getName());
        self::assertStringStartsWith('user_', $user->getId());
    }

    public function testCreateUserTryCatchWithInvalidEmail(): void
    {
        $invalidEmailTryCatch = CreateUserTryCatch::new(
            'invalid-email',
            'Invalid User',
            $this->logger
        );

        $user = $invalidEmailTryCatch->execute();

        self::assertNull($user);
    }

    public function testCreateUserUsingHandlersTryCatchWithValidEmail(): void
    {
        $validEmailTryCatch = CreateUserUsingHandlersTryCatch::new(
            'john.doe@example.com',
            'John Doe',
            $this->logger
        );

        $user = $validEmailTryCatch->execute();

        self::assertInstanceOf(User::class, $user);
        self::assertSame('john.doe@example.com', $user->getEmail());
        self::assertSame('John Doe', $user->getName());
        self::assertStringStartsWith('user_', $user->getId());
    }

    public function testCreateUserUsingHandlersTryCatchWithInvalidEmail(): void
    {
        $invalidEmailTryCatch = CreateUserUsingHandlersTryCatch::new(
            'invalid-email',
            'Invalid User',
            $this->logger
        );

        $user = $invalidEmailTryCatch->execute();

        self::assertNull($user);
    }
}
