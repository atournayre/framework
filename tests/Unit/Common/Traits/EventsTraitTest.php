<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Traits;

use Atournayre\Common\VO\Event;
use Atournayre\Tests\Fixtures\Event\KernelEvent;
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
     * @throws \Throwable
     */
    public function testAddEvent(): void
    {
        $object = new ObjectWithEvents();
        $event = new Event();
        $object->addEvent($event);

        self::assertSame($event, $object->events()->first());
    }

    /**
     * @throws \Exception
     */
    public function testSetEvent(): void
    {
        $object = new ObjectWithEvents();
        $newEvent = new Event();
        $object->setEvent($newEvent->_identifier(), $newEvent);

        self::assertSame($newEvent, $object->events()->first());
    }

    /**
     * @throws \Exception
     */
    public function testRemoveEvent(): void
    {
        $object = new ObjectWithEvents();
        $event = new Event();
        $object->addEvent($event);
        $object->removeEvent($event);

        self::assertTrue($object->events()->hasNoElement()->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testEvents(): void
    {
        $object = new ObjectWithEvents();
        $event = new Event();
        $object->addEvent($event);

        self::assertTrue($object->events()->count()->equalsTo(1)->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testFilterEventsByType(): void
    {
        $object = new ObjectWithEvents();
        $event = new Event();
        $object->addEvent($event);

        self::assertCount(1, $object->filterEventsByType(Event::class)->toArray());
    }

    /**
     * @throws \Exception
     */
    public function testAddEventForNotAllowedType(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Event type "Atournayre\Tests\Fixtures\Event\KernelEvent" is not allowed for this object');

        $object = new ObjectWithEvents();
        $event = new KernelEvent();
        $object->addEvent($event);
    }

    /**
     * @throws \Exception
     */
    public function testSetEventForNotAllowedType(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Event type "Atournayre\Tests\Fixtures\Event\KernelEvent" is not allowed for this object');

        $object = new ObjectWithEvents();
        $event = new KernelEvent();
        $object->setEvent($event->_identifier(), $event);
    }
}
