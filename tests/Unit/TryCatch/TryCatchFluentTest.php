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
    private ExampleService $service;
    private NullLogger $logger;

    protected function setUp(): void
    {
        $this->service = new ExampleService();
        $this->logger = new NullLogger();
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testSuccessfulExecution(): void
    {
        $result = TryCatch::with(fn() => $this->service->doSomething('hello'), $this->logger)
            ->catch(InvalidArgumentException::class, fn($e) => 'invalid argument: ' . $e->getMessage())
            ->catch(RuntimeException::class, fn($e) => 'runtime error: ' . $e->getMessage())
            ->finally(fn() => $this->logger->info('Finally reached'))
            ->run();

        self::assertSame('Processed: hello', $result);
    }

    /**
     * @throws \Throwable
     * @throws ThrowableInterface
     */
    public function testInvalidArgumentException(): void
    {
        $result = TryCatch::with(fn() => $this->service->doSomething(''), $this->logger)
            ->catch(InvalidArgumentException::class, fn($e) => 'invalid argument: ' . $e->getMessage())
            ->catch(RuntimeException::class, fn($e) => 'runtime error: ' . $e->getMessage())
            ->finally(fn() => $this->logger->info('Finally reached'))
            ->run();

        self::assertSame('invalid argument: Input cannot be empty', $result);
    }

    /**
     * @throws ThrowableInterface
     * @throws \Throwable
     */
    public function testRuntimeException(): void
    {
        $result = TryCatch::with(fn() => $this->service->doSomething('trigger_runtime'), $this->logger)
            ->catch(InvalidArgumentException::class, fn($e) => 'invalid argument: ' . $e->getMessage())
            ->catch(RuntimeException::class, fn($e) => 'runtime error: ' . $e->getMessage())
            ->finally(fn() => $this->logger->info('Finally reached'))
            ->run();

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

        TryCatch::with(fn() => $this->service->doSomething('trigger_runtime'), $this->logger)
            ->catch(InvalidArgumentException::class, fn($e) => 'invalid argument: ' . $e->getMessage())
            // No handler for RuntimeException
            ->finally(fn() => $this->logger->info('Finally reached'))
            ->run();
    }
}

/**
 * Simple service for demonstration purposes.
 */
class ExampleService
{
    public function doSomething(string $input): string
    {
        if (empty($input)) {
            throw InvalidArgumentException::new('Input cannot be empty');
        }
        
        if ($input === 'trigger_runtime') {
            throw RuntimeException::new('Runtime exception triggered');
        }
        
        return "Processed: $input";
    }
}
