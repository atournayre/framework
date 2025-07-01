<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\DependencyInjection;

use Atournayre\Contracts\CommandBus\CommandBusInterface;
use Atournayre\Contracts\CommandBus\QueryBusInterface;
use Atournayre\Contracts\DependencyInjection\DependencyInjectionAwareInterface;
use Atournayre\DependencyInjection\DependencyInjectionPostLoad;
use Atournayre\DependencyInjection\EntityDependencyInjection;
use Atournayre\Traits\DependencyInjectionTrait;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PostLoadEventArgs;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

final class DependencyInjectionPostLoadTest extends TestCase
{
    private EntityDependencyInjection $entityDependencyInjection;
    private DependencyInjectionPostLoad $listener;

    protected function setUp(): void
    {
        // Create real EntityDependencyInjection with mocked dependencies
        $commandBus = $this->createMock(CommandBusInterface::class);
        $queryBus = $this->createMock(QueryBusInterface::class);
        $logger = $this->createMock(LoggerInterface::class);

        $this->entityDependencyInjection = new EntityDependencyInjection(
            $commandBus,
            $queryBus,
            $logger
        );

        $this->listener = new DependencyInjectionPostLoad($this->entityDependencyInjection);
    }

    public function testInjectsDependenciesIntoAwareEntity(): void
    {
        // Arrange
        $entity = new TestEntityWithDependencyInjection();
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $eventArgs = new PostLoadEventArgs($entity, $entityManager);

        // Act
        ($this->listener)($eventArgs);

        // Assert
        $this->assertSame($this->entityDependencyInjection, $entity->dependencyInjection());
    }

    public function testIgnoresEntityThatIsNotDependencyInjectionAware(): void
    {
        // Arrange
        $entity = new TestEntityWithoutDependencyInjection();
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $eventArgs = new PostLoadEventArgs($entity, $entityManager);

        // Act & Assert - should not throw any exception
        ($this->listener)($eventArgs);

        // The test passes if no exception is thrown
        $this->assertTrue(true);
    }
}

/**
 * Test entity that implements DependencyInjectionAwareInterface.
 */
final class TestEntityWithDependencyInjection implements DependencyInjectionAwareInterface
{
    use DependencyInjectionTrait;
}

/**
 * Test entity that does not implement DependencyInjectionAwareInterface.
 */
final class TestEntityWithoutDependencyInjection
{
    // This entity intentionally does not implement DependencyInjectionAwareInterface
}
