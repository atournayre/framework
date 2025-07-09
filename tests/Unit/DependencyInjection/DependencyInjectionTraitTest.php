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

    public function testWithDependencyInjectionReturnsNewInstance(): void
    {
        // Arrange
        $dependencyInjection = $this->createMock(DependencyInjectionInterface::class);
        $originalObject = new TestObjectWithDependencyInjection();

        // Act
        $newObject = $originalObject->withDependencyInjection($dependencyInjection);

        // Assert
        self::assertNotSame($originalObject, $newObject);
        self::assertSame($dependencyInjection, $newObject->dependencyInjection());
    }

    public function testWithDependencyInjectionDoesNotModifyOriginal(): void
    {
        // Arrange
        $dependencyInjection = $this->createMock(DependencyInjectionInterface::class);
        $originalObject = new TestObjectWithDependencyInjection();

        // Act
        $newObject = $originalObject->withDependencyInjection($dependencyInjection);

        // Assert
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Dependency injection has not been set');
        $originalObject->dependencyInjection(); // Should still throw exception
    }

    public function testWithDependencyInjectionPreservesOtherProperties(): void
    {
        // Arrange
        $dependencyInjection = $this->createMock(DependencyInjectionInterface::class);
        $originalObject = new TestObjectWithDependencyInjection();
        $originalObject->setTestProperty('test value');

        // Act
        $newObject = $originalObject->withDependencyInjection($dependencyInjection);

        // Assert
        self::assertSame('test value', $newObject->getTestProperty());
        self::assertSame($dependencyInjection, $newObject->dependencyInjection());
    }
}

/**
 * Test class for testing DependencyInjectionTrait.
 */
final class TestObjectWithDependencyInjection implements DependencyInjectionAwareInterface
{
    use DependencyInjectionTrait;

    private string $testProperty = '';

    /**
     * @api
     */
    public function getTestProperty(): string
    {
        return $this->testProperty;
    }

    /**
     * @api
     */
    public function setTestProperty(string $testProperty): void
    {
        $this->testProperty = $testProperty;
    }
}
