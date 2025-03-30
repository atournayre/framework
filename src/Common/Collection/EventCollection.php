<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\Collection\Event\EventFilterCollection;
use Atournayre\Common\Collection\Event\EventSearchCollection;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Collection\CollectionAddInterface;
use Atournayre\Contracts\Collection\CollectionCanBeEmptyInterface;
use Atournayre\Contracts\Collection\CollectionRemoveInterface;
use Atournayre\Contracts\Collection\Event\EventFilterInterface;
use Atournayre\Contracts\Collection\Event\EventSearchInterface;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

final class EventCollection implements MapInterface, EventSearchInterface, EventFilterInterface, CollectionCanBeEmptyInterface, CollectionAddInterface, CollectionRemoveInterface
{
    use CollectionTrait;

    /**
     * @param array<string, Event|mixed> $collection
     */
    public static function asMap(array $collection = []): self
    {
        Assert::isMapOf($collection, Event::class);

        return new self(Collection::of($collection));
    }

    /**
     * @api
     */
    public static function empty(): self
    {
        return EventCollection::asMap([]);
    }

    public function filter(): EventFilterCollection
    {
        return EventFilterCollection::new($this);
    }

    public function search(): EventSearchCollection
    {
        return EventSearchCollection::new($this);
    }

    /**
     * @api
     */
    public function add(mixed $value, ?\Closure $callback = null): self
    {
        $key = $value->_identifier();
        $this->set($key, $value, $callback);

        return $this;
    }

    /**
     * @api
     *
     * @param Event|mixed $element
     */
    public function remove(mixed $element): void
    {
        $index = $this
            ->collection
            ->search($element)
        ;

        if (null === $index) {
            return;
        }

        $this
            ->collection
            ->offsetUnset($index)
        ;
    }
}
