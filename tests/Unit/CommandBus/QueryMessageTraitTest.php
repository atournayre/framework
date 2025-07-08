<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\CommandBus;

use Atournayre\Contracts\CommandBus\QueryBusInterface;
use Atournayre\Contracts\CommandBus\QueryInterface;
use Atournayre\Traits\QueryMessageTrait;
use PHPUnit\Framework\TestCase;

final class QueryMessageTraitTest extends TestCase
{
    public function testQueryAsksFromBusAndReturnsResult(): void
    {
        // Arrange
        $queryBus = $this->createMock(QueryBusInterface::class);
        $query = new TestQuery();
        $expectedResult = 'test result';

        // Assert
        $queryBus->expects(self::once())
            ->method('ask')
            ->with(self::identicalTo($query))
            ->willReturn($expectedResult)
        ;

        // Act
        $result = $query->query($queryBus);

        // Assert
        self::assertSame($expectedResult, $result);
    }
}

/**
 * Test query class for testing QueryMessageTrait.
 */
final class TestQuery implements QueryInterface
{
    use QueryMessageTrait;
}
