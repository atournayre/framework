<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\VO;

use Atournayre\Common\VO\Event;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

final class EventTest extends TestCase
{
    private MessageBusInterface|MockObject $messageBus;
    private Event $event;

    protected function setUp(): void
    {
        $this->messageBus = $this->createMock(MessageBusInterface::class);
        $this->event = new Event();
    }

    public function testDispatch(): void
    {
        // Expect the message bus to dispatch the event
        $this->messageBus->expects(self::once())
            ->method('dispatch')
            ->with($this->event)
            ->willReturn(new Envelope($this->event))
        ;

        // Call the dispatch method
        $this->event->dispatch($this->messageBus);
    }

    public function testIsPropagationStopped(): void
    {
        // Initially, propagation should not be stopped
        self::assertFalse($this->event->isPropagationStopped());
    }

    public function testStopPropagation(): void
    {
        // Stop propagation
        $this->event->stopPropagation();

        // Verify propagation is stopped
        self::assertTrue($this->event->isPropagationStopped());
    }
}
