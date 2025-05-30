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
        // The logger should expect info method to be called twice for each event
        $logger->expects($this->exactly(4))
            ->method('info')
            ->withConsecutive(
                [$this->stringContains('Dispatching'), $this->anything()],
                [$this->stringContains('dispatched'), $this->anything()],
                [$this->stringContains('Dispatching'), $this->anything()],
                [$this->stringContains('dispatched'), $this->anything()]
            );

        // Create a mock for MessageBusInterface
        $messageBus = $this->createMock(MessageBusInterface::class);
        // The message bus should expect dispatch method to be called twice (once for each event)
        $messageBus->expects($this->exactly(2))
            ->method('dispatch')
            ->withConsecutive(
                [$this->isInstanceOf(KernelEvent::class)],
                [$this->isInstanceOf(ResponseEvent::class)]
            )
            ->willReturnCallback(function ($message) {
                return new \Symfony\Component\Messenger\Envelope($message);
            });

        // Create events
        $kernelEvent = new KernelEvent();
        $responseEvent = new ResponseEvent();

        // Create event collection with events
        $eventCollection = EventCollection::empty()
            ->add($kernelEvent)
            ->add($responseEvent);

        // Assert that the collection has 2 events before dispatch
        self::assertTrue($eventCollection->count()->equalsTo(2)->isTrue());

        // Dispatch events
        $eventCollection->dispatch($logger, $messageBus);

        // Assert that the collection is empty after dispatch
        self::assertTrue($eventCollection->count()->equalsTo(0)->isTrue());
    }
}
