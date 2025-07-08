<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\CommandBus;

use Atournayre\Contracts\CommandBus\CommandBusInterface;
use Atournayre\Contracts\CommandBus\CommandInterface;
use Atournayre\Traits\CommandMessageTrait;
use PHPUnit\Framework\TestCase;

final class CommandMessageTraitTest extends TestCase
{
    public function testCommandDispatchesToBus(): void
    {
        // Arrange
        $commandBus = $this->createMock(CommandBusInterface::class);
        $command = new TestCommand();

        // Assert
        $commandBus->expects(self::once())
            ->method('dispatch')
            ->with(self::identicalTo($command))
        ;

        // Act
        $command->command($commandBus);
    }
}

/**
 * Test command class for testing CommandMessageTrait.
 */
final class TestCommand implements CommandInterface
{
    use CommandMessageTrait;
}
