<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Persistance;

use Atournayre\Common\Persistance\Database;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Atournayre\Common\Persistance\Database
 */
class DatabaseTest extends TestCase
{
    private EntityManagerInterface|MockObject $entityManager;
    private object $object;
    private Database $database;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->object = new \stdClass();
        $this->database = Database::new(
            entityManager: $this->entityManager,
            object: $this->object,
        );
    }

    public function testPersist(): void
    {
        $this->entityManager
            ->expects(self::once())
            ->method('persist')
            ->with($this->object)
        ;

        $this->database->persist();
    }

    public function testFlush(): void
    {
        $this->entityManager
            ->expects(self::once())
            ->method('flush')
        ;

        $this->database->flush();
    }

    public function testRemove(): void
    {
        $this->entityManager
            ->expects(self::once())
            ->method('remove')
            ->with($this->object)
        ;

        $this->database->remove();
    }

    public function testNewCreatesInstance(): void
    {
        $database = Database::new(
            entityManager: $this->entityManager,
            object: $this->object,
        );

        self::assertInstanceOf(Database::class, $database);
    }
}
