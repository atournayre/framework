<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\DependencyInjection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\DependencyInjection\DependencyInjectionAwareInterface;
use Atournayre\Contracts\DependencyInjection\DependencyInjectionInterface;
use Atournayre\Traits\DependencyInjectionTrait;
use PHPUnit\Framework\TestCase;

final class DependencyInjectionTraitTest extends TestCase
{
    public function testSetAndGetDependencyInjection(): void
    {
        // Arrange
        $dependencyInjection = $this->createMock(DependencyInjectionInterface::class);
        $testObject = new TestObjectWithDependencyInjection();

        // Act
        $testObject->setDependencyInjection($dependencyInjection);
        $result = $testObject->dependencyInjection();

        // Assert
        self::assertSame($dependencyInjection, $result);
    }

    public function testDependencyInjectionThrowsExceptionWhenNotSet(): void
    {
        // Arrange
        $testObject = new TestObjectWithDependencyInjection();

        // Assert
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Dependency injection has not been set');

        // Act
        $testObject->dependencyInjection();
    }
}

/**
 * Test class for testing DependencyInjectionTrait.
 */
final class TestObjectWithDependencyInjection implements DependencyInjectionAwareInterface
{
    use DependencyInjectionTrait;
}
