<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Collection\AddInterface;
use Atournayre\Contracts\Collection\AsMapInterface;
use Atournayre\Contracts\Collection\AtLeastOneElementInterface;
use Atournayre\Contracts\Collection\ContainsInterface;
use Atournayre\Contracts\Collection\CountInterface;
use Atournayre\Contracts\Collection\EachInterface;
use Atournayre\Contracts\Collection\FirstInterface;
use Atournayre\Contracts\Collection\HasNoElementInterface;
use Atournayre\Contracts\Collection\HasOneElementInterface;
use Atournayre\Contracts\Collection\HasSeveralElementsInterface;
use Atournayre\Contracts\Collection\HasXElementsInterface;
use Atournayre\Contracts\Collection\KeysInterface;
use Atournayre\Contracts\Collection\LastInterface;
use Atournayre\Contracts\Collection\SearchInterface;
use Atournayre\Contracts\Collection\ToArrayInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class EventCollection implements AsMapInterface, AddInterface, ContainsInterface, SearchInterface, CountInterface, ToArrayInterface, FirstInterface, LastInterface, EachInterface, KeysInterface, HasXElementsInterface, HasNoElementInterface, HasOneElementInterface, HasSeveralElementsInterface, AtLeastOneElementInterface
{
    use CollectionTrait;

    /**
     * @param array<string, Event|mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection = []): self
    {
        Assert::isMapOf($collection, Event::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function empty(): self
    {
        return EventCollection::asMap([]);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function filterByType(string $type): self
    {
        $clone = clone $this;
        $events = $clone
            ->collection
            ->filter(static fn (Event $event): bool => $event instanceof $type)
            ->toArray()
        ;

        $eventCollection = EventCollection::empty();
        foreach ($events as $event) {
            $eventCollection = $eventCollection->add($event);
        }

        return $eventCollection;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function add(mixed $value, ?\Closure $callback = null): self
    {
        $key = $value->_identifier();
        $this->set($key, $value, $callback);

        return $this;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function addWithCallback(mixed $value, \Closure $callback): self
    {
        $key = $value->_identifier();
        $this->set($key, $value, $callback);

        return $this;
    }

    /**
     * @api
     */
    public function contains(mixed $key, ?string $operator = null, mixed $value = null): BoolEnum
    {
        return $this
            ->collection
            ->contains($key, $operator, $value)
        ;
    }

    /**
     * @api
     */
    public function search(mixed $value, bool $strict = true): int|string|null
    {
        return $this
            ->collection
            ->search($value, $strict)
        ;
    }

    /**
     * @api
     */
    public function remove(Event $event): void
    {
        $index = $this
            ->collection
            ->search($event)
        ;

        if (null === $index) {
            return;
        }

        $this
            ->collection
            ->offsetUnset($index)
        ;
    }

    /**
     * @api
     */
    public function dispatch(
        LoggerInterface $logger,
        MessageBusInterface $messageBus,
    ): void {
        $this
            ->collection
            ->each(
                function (Event $event) use ($logger, $messageBus): void {
                    $logger->info(sprintf('Dispatching %s event', $event->_type()), $event->toLog());

                    $messageBus->dispatch($event);
                    $this->remove($event);

                    $logger->info(sprintf('Event %s dispatched', $event->_type()), $event->toLog());
                },
            )
        ;
    }
}
