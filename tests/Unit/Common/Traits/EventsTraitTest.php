<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Traits;

use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Tests\Fixtures\Event\ObjectWithEvents;
use PHPUnit\Framework\TestCase;

final class EventsTraitTest extends TestCase
{
    public function testEmptyEvents(): void
    {
        $object = new ObjectWithEvents();

        self::assertTrue($object->events()->hasNoElement()->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testAddEvent(): void
    {
        $object = new ObjectWithEvents();
        $event = new Event();
        $object->events()->add($event);

        self::assertSame($event, $object->events()->first());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testSetEvent(): void
    {
        $object = new ObjectWithEvents();
        $newEvent = new Event();
        $object->events()->set($newEvent->_identifier(), $newEvent);

        self::assertSame($newEvent, $object->events()->first());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testRemoveEvent(): void
    {
        $object = new ObjectWithEvents();
        $event = new Event();
        $object->events()->add($event);
        $object->events()->remove($event);

        self::assertTrue($object->events()->hasNoElement()->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testEvents(): void
    {
        $object = new ObjectWithEvents();
        $event = new Event();
        $object->events()->add($event);

        self::assertTrue($object->events()->count()->equalsTo(1)->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFilterEventsByType(): void
    {
        $object = new ObjectWithEvents();
        $event = new Event();
        $object->events()->add($event);

        self::assertCount(1, $object->events()->filterByType(Event::class)->toArray());
    }
}
