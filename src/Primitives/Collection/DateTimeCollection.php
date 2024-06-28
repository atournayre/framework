<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\VO\DateTime\DateTime;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;

class DateTimeCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return DateTime::class;
    }

    /**
     * @api
     *
     * @return DateTimeCollection<TKey, TValue>
     */
    public function sortAsc(): self
    {
        $clone = clone $this;
        $values = $clone
            ->toMap()
            ->usort(static fn (DateTime $a, DateTime $b) => $a <=> $b)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::from($values);
    }

    /**
     * @api
     *
     * @return DateTimeCollection<TKey, TValue>
     */
    public function sortDesc(): self
    {
        $clone = clone $this;
        $values = $clone
            ->toMap()
            ->usort(static fn (DateTime $a, DateTime $b) => $b <=> $a)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($values);
    }

    /**
     * @api
     */
    public function mostRecent(): DateTime
    {
        return $this->sortDesc()
            ->first();
    }

    /**
     * @api
     */
    public function oldest(): DateTime
    {
        return $this->sortAsc()
            ->first();
    }

    /**
     * @api
     *
     * @return DateTimeCollection<TKey, TValue>
     */
    public function between(DateTime $start, DateTime $end): self
    {
        $clone = clone $this;
        $map = $clone
            ->toMap()
            ->filter(static fn (DateTime $date) => $date >= $start && $date <= $end)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($map);
    }

    /**
     * @api
     *
     * @return DateTimeCollection<TKey, TValue>
     */
    public function before(DateTime $date): self
    {
        $clone = clone $this;
        $map = $clone
            ->toMap()
            ->filter(static fn (DateTime $d) => $d < $date)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($map);
    }

    /**
     * @api
     *
     * @return DateTimeCollection<TKey, TValue>
     */
    public function after(DateTime $date): self
    {
        $clone = clone $this;
        $map = $clone
            ->toMap()
            ->filter(static fn (DateTime $d) => $d > $date)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($map);
    }

    /**
     * @api
     *
     * @return array<string>
     */
    public function toLog(): array
    {
        return $this->toMap()
            ->map(static fn (DateTime $date) => $date->toLog())
            ->toArray()
        ;
    }
}
