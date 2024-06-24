<?php

declare(strict_types=1);

namespace Unit\Common\Collection;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;
use Atournayre\Tests\Fixtures\Event\KernelEvent;
use Atournayre\Tests\Fixtures\Event\ResponseEvent;
use PHPUnit\Framework\TestCase;

final class EventCollectionTest extends TestCase
{
    public function testEventCollection(): void
    {
        $eventCollection = EventCollection::empty()
            ->add(new Event())
        ;
        self::assertCount(1, $eventCollection);
    }

    public function testEventCollectionEvents(): void
    {
        $event = new Event();
        $eventCollection = EventCollection::empty()
            ->add($event)
        ;
        self::assertTrue(
            $eventCollection->toArrayCollection()
                ->contains($event)
        );
    }

    public function testEventCollectionEventsType(): void
    {
        $kernelEvent = new KernelEvent();
        $responseEvent = new ResponseEvent();
        $eventCollection = EventCollection::empty()
            ->add($kernelEvent)
            ->add($responseEvent)
        ;

        self::assertCount(1, $eventCollection->filterByType(KernelEvent::class));
        self::assertTrue(
            $eventCollection
                ->filterByType(KernelEvent::class)
                ->toArrayCollection()
                ->contains($kernelEvent)
        );
    }
}
