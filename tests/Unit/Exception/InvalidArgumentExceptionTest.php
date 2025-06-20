<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Exception;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggerInterface;
use PHPUnit\Framework\TestCase;

class InvalidArgumentExceptionTest extends TestCase
{
    public function testNew(): void
    {
        $exception = InvalidArgumentException::new('Test message', 123);
        self::assertInstanceOf(InvalidArgumentException::class, $exception); // @phpstan-ignore-line
        self::assertSame('Test message', $exception->getMessage());
        self::assertSame(123, $exception->getCode());
    }

    public function testFromThrowable(): void
    {
        $previous = new \Exception('Previous exception', 456);
        $exception = InvalidArgumentException::fromThrowable($previous);
        self::assertInstanceOf(InvalidArgumentException::class, $exception); // @phpstan-ignore-line
        self::assertSame('Previous exception', $exception->getMessage());
        self::assertSame(456, $exception->getCode());
        self::assertSame($previous, $exception->getPrevious());
    }

    public function testWithPrevious(): void
    {
        $previous = new \Exception('Previous exception');
        $exception = InvalidArgumentException::new('Test message')->withPrevious($previous);
        self::assertInstanceOf(InvalidArgumentException::class, $exception); // @phpstan-ignore-line
        self::assertSame('Test message', $exception->getMessage());
        self::assertSame($previous, $exception->getPrevious());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testThrow(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $exception = InvalidArgumentException::new('Test message');
        $exception->throw();
    }

    public function testIsInstanceOfCoreInvalidArgumentException(): void
    {
        $exception = InvalidArgumentException::new('Test message');
        self::assertInstanceOf(\InvalidArgumentException::class, $exception); // @phpstan-ignore-line
    }

    public function testLog(): void
    {
        // Create a mock for LoggerInterface
        $logger = $this->createMock(LoggerInterface::class);

        // Set up expectations
        $context = ['key' => 'value'];
        $exception = InvalidArgumentException::new('Test message');

        // Expect the exception method to be called once with the exception and context
        $logger->expects(self::once())
            ->method('exception')
            ->with($exception, $context)
        ;

        // Call the log method
        $exception->log($logger, $context);
    }
}
