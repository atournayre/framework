<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\TryCatch;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\TryCatch\TryCatch;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class TryCatchFluentTest extends TestCase
{
    private readonly ExampleService $service;
    private readonly NullLogger $logger;

    protected function setUp(): void
    {
        $this->service = new ExampleService();
        $this->logger = new NullLogger();
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testFinallyBlockCanReturnValue(): void
    {
        $result = TryCatch::with(fn () => $this->service->doSomething('hello'), $this->logger)
            ->catch(InvalidArgumentException::class, fn ($e) => 'invalid argument: '.$e->getMessage())
            ->finally(fn () => 'Value from finally block')
            ->execute()
        ;

        self::assertSame('Value from finally block', $result);
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testFinallyBlockReturningNullDoesNotOverrideResult(): void
    {
        $result = TryCatch::with(fn () => $this->service->doSomething('hello'), $this->logger)
            ->catch(InvalidArgumentException::class, fn ($e) => 'invalid argument: '.$e->getMessage())
            ->finally(fn () => null)
            ->execute()
        ;

        self::assertSame('Processed: hello', $result);
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testSuccessfulExecution(): void
    {
        $result = TryCatch::with(fn () => $this->service->doSomething('hello'), $this->logger)
            ->catch(InvalidArgumentException::class, fn ($e) => 'invalid argument: '.$e->getMessage())
            ->catch(RuntimeException::class, fn ($e) => 'runtime error: '.$e->getMessage())
            ->finally(fn () => $this->logger->info('Finally reached'))
            ->execute()
        ;

        self::assertSame('Processed: hello', $result);
    }

    /**
     * @throws \Throwable
     * @throws ThrowableInterface
     */
    public function testInvalidArgumentException(): void
    {
        $result = TryCatch::with(fn () => $this->service->doSomething(''), $this->logger)
            ->catch(InvalidArgumentException::class, fn ($e) => 'invalid argument: '.$e->getMessage())
            ->catch(RuntimeException::class, fn ($e) => 'runtime error: '.$e->getMessage())
            ->finally(fn () => $this->logger->info('Finally reached'))
            ->execute()
        ;

        self::assertSame('invalid argument: Input cannot be empty', $result);
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testRuntimeException(): void
    {
        $result = TryCatch::with(fn () => $this->service->doSomething('trigger_runtime'), $this->logger)
            ->catch(InvalidArgumentException::class, fn ($e) => 'invalid argument: '.$e->getMessage())
            ->catch(RuntimeException::class, fn ($e) => 'runtime error: '.$e->getMessage())
            ->finally(fn () => $this->logger->info('Finally reached'))
            ->execute()
        ;

        self::assertSame('runtime error: Runtime exception triggered', $result);
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testUnhandledException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Runtime exception triggered');

        TryCatch::with(fn () => $this->service->doSomething('trigger_runtime'), $this->logger)
            ->catch(InvalidArgumentException::class, fn ($e) => 'invalid argument: '.$e->getMessage())
            // No handler for RuntimeException
            ->finally(fn () => $this->logger->info('Finally reached'))
            ->execute()
        ;
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testVoidTryBlockWithCatchReturningValue(): void
    {
        $result = TryCatch::with(fn () => $this->service->doVoidAction(''), $this->logger)
            ->catch(InvalidArgumentException::class, fn ($e) => 'Error handled: '.$e->getMessage())
            ->execute()
        ;

        self::assertSame('Error handled: Input cannot be empty', $result);
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testVoidTryBlockWithRuntimeException(): void
    {
        $result = TryCatch::with(fn () => $this->service->doVoidAction('trigger_runtime'), $this->logger)
            ->catch(RuntimeException::class, fn ($e) => 'Runtime error: '.$e->getMessage())
            ->execute()
        ;

        self::assertSame('Runtime error: Runtime exception triggered', $result);
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testSuccessfulVoidTryBlock(): void
    {
        $result = TryCatch::with(fn () => $this->service->doVoidAction('hello'), $this->logger)
            ->catch(InvalidArgumentException::class, fn ($e) => 'Error handled: '.$e->getMessage())
            ->execute()
        ;

        self::assertNull($result);
    }

    /**
     * @throws \Throwable
     */
    public function testReThrowWithCustomMessage(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Custom message for reThrow');

        TryCatch::with(fn () => $this->service->doSomething('trigger_runtime'), $this->logger)
            ->reThrow(RuntimeException::class, 'Custom message for reThrow')
            ->execute()
        ;
    }

    /**
     * @throws \Throwable
     */
    public function testReThrowWithRuntimeException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Runtime exception triggered');

        TryCatch::with(fn () => $this->service->doSomething('trigger_runtime'), $this->logger)
            ->reThrow(RuntimeException::class)
            ->execute()
        ;
    }

    /**
     * @throws \Throwable
     */
    public function testReThrow(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Custom message for reThrow');

        TryCatch::with(fn () => $this->service->doSomething(''), $this->logger)
            ->reThrow(InvalidArgumentException::class, 'Custom message for reThrow')
            ->execute()
        ;
    }

    /**
     * @throws \Throwable
     */
    public function testReThrowWithOriginalMessage(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Input cannot be empty');

        TryCatch::with(fn () => $this->service->doSomething(''), $this->logger)
            ->reThrow(InvalidArgumentException::class)
            ->execute()
        ;
    }
}

/**
 * Simple service for demonstration purposes.
 */
class ExampleService
{
    /**
     * @api
     */
    public function doSomething(string $input): string
    {
        if ('' === $input) {
            throw InvalidArgumentException::new('Input cannot be empty');
        }

        if ('trigger_runtime' === $input) {
            throw RuntimeException::new('Runtime exception triggered');
        }

        return "Processed: $input";
    }

    /**
     * A method that performs an action but doesn't return anything.
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     *
     * @api
     */
    public function doVoidAction(string $input): void
    {
        if ('' === $input) {
            throw InvalidArgumentException::new('Input cannot be empty');
        }

        if ('trigger_runtime' === $input) {
            throw RuntimeException::new('Runtime exception triggered');
        }

        // Just do something without returning a value
    }
}
