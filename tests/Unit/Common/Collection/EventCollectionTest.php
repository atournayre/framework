<?php

declare(strict_types=1);

namespace Unit\Common\Collection;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Tests\Fixtures\Event\KernelEvent;
use Atournayre\Tests\Fixtures\Event\ResponseEvent;
use PHPUnit\Framework\TestCase;

final class EventCollectionTest extends TestCase
{
    /**
     * @throws ThrowableInterface
     */
    public function testEventCollection(): void
    {
        $eventCollection = EventCollection::empty()
            ->add(new Event())
        ;
        self::assertTrue($eventCollection->count()->equalsTo(1)->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testEventCollectionEvents(): void
    {
        $event = new Event();
        $eventCollection = EventCollection::empty()
            ->add($event)
        ;
        self::assertTrue($eventCollection->contains($event)->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testEventCollectionEventsType(): void
    {
        $kernelEvent = new KernelEvent();
        $responseEvent = new ResponseEvent();
        $eventCollection = EventCollection::empty()
            ->add($kernelEvent)
            ->add($responseEvent)
        ;

        self::assertCount(1, $eventCollection->filterByType(KernelEvent::class)->toArray());
        self::assertTrue($eventCollection->filterByType(KernelEvent::class)->contains($kernelEvent)->isTrue());
    }
}
