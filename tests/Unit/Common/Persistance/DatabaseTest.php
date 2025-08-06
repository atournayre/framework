<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Persistance;

use Atournayre\Common\Persistance\Database;
use Atournayre\Contracts\CommandBus\CommandBusInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Atournayre\Common\Persistance\Database
 */
class DatabaseTest extends TestCase
{
    private readonly CommandBusInterface|MockObject $commandBus;
    private readonly object $object;
    private readonly Database $database;

    protected function setUp(): void
    {
        $this->commandBus = $this->createMock(CommandBusInterface::class);
        $this->object = new \stdClass();
        $this->database = Database::new(
            commandBus: $this->commandBus,
            object: $this->object,
        );
    }

    public function testPersist(): void
    {
        $this->commandBus
            ->expects(self::once())
            ->method('dispatch')
            ->with(self::callback(function ($command) {
                return $command instanceof \Atournayre\Common\Persistance\Command\DatabasePersistCommand
                    && $command->object() === $this->object;
            }))
        ;

        $this->database->persist();
    }

    public function testFlush(): void
    {
        $this->commandBus
            ->expects(self::once())
            ->method('dispatch')
            ->with(self::callback(function ($command) {
                return $command instanceof \Atournayre\Common\Persistance\Command\DatabaseFlushCommand;
            }))
        ;

        $this->database->flush();
    }

    public function testRemove(): void
    {
        $this->commandBus
            ->expects(self::once())
            ->method('dispatch')
            ->with(self::callback(function ($command) {
                return $command instanceof \Atournayre\Common\Persistance\Command\DatabaseRemoveCommand
                    && $command->object() === $this->object;
            }))
        ;

        $this->database->remove();
    }

    public function testNewCreatesMethodChaining(): void
    {
        $this->commandBus
            ->expects(self::once())
            ->method('dispatch')
            ->with(self::callback(function ($command) {
                return $command instanceof \Atournayre\Common\Persistance\Command\DatabasePersistCommand
                    && $command->object() === $this->object;
            }))
        ;

        $database = Database::new(
            commandBus: $this->commandBus,
            object: $this->object,
        );

        // Test that method chaining works
        $result = $database->persist();
        self::assertSame($database, $result);
    }
}
