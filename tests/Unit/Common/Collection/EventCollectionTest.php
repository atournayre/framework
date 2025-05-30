<?php

declare(strict_types=1);

namespace Unit\Common\Collection;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Tests\Fixtures\Event\KernelEvent;
use Atournayre\Tests\Fixtures\Event\ResponseEvent;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\MessageBusInterface;

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

    /**
     * @throws ThrowableInterface
     */
    public function testDispatch(): void
    {
        // Create a mock for LoggerInterface
        $logger = $this->createMock(LoggerInterface::class);
        // The logger should expect info method to be called 4 times (twice for each event)
        $logger->expects(self::atLeast(4))
            ->method('info')
        ;

        // Create a mock for MessageBusInterface
        $messageBus = $this->createMock(MessageBusInterface::class);
        // The message bus should expect dispatch method to be called twice (once for each event)
        $messageBus->expects(self::exactly(2))
            ->method('dispatch')
            ->willReturnCallback(function ($message) {
                return new \Symfony\Component\Messenger\Envelope($message);
            })
        ;

        // Create events
        $kernelEvent = new KernelEvent();
        $responseEvent = new ResponseEvent();

        // Create event collection with events
        $eventCollection = EventCollection::empty()
            ->add($kernelEvent)
            ->add($responseEvent)
        ;

        // Assert that the collection has 2 events before dispatch
        self::assertTrue($eventCollection->count()->equalsTo(2)->isTrue());

        // Dispatch events
        $eventCollection->dispatch($logger, $messageBus);

        // Assert that the collection is empty after dispatch
        self::assertTrue($eventCollection->count()->equalsTo(0)->isTrue());
    }
}
