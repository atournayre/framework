<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\DateTime\DateTime;
use Atournayre\Contracts\Collection\ListInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\CollectionTrait;

final class DateTimeCollection implements ListInterface
{
    use CollectionTrait;

    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, DateTime::class);

        return new self(Collection::of($collection));
    }

    /**
     * @api
     */
    public function sortAsc(): self
    {
        $clone = clone $this;
        $values = $clone
            ->collection
            ->usort(static fn (DateTime $a, DateTime $b) => $a <=> $b)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($values);
    }

    /**
     * @api
     */
    public function sortDesc(): self
    {
        $clone = clone $this;
        $values = $clone
            ->collection
            ->usort(static fn (DateTime $a, DateTime $b) => $b <=> $a)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($values);
    }

    /**
     * @api
     *
     * @throws \Throwable
     */
    public function mostRecent(): DateTime
    {
        return $this->sortDesc()
            ->collection
            ->first()
        ;
    }

    /**
     * @throws \Throwable
     *
     * @api
     */
    public function oldest(): DateTime
    {
        return $this->sortAsc()
            ->collection
            ->first()
        ;
    }

    /**
     * @api
     */
    public function between(DateTime $start, DateTime $end): self
    {
        $clone = clone $this;
        $map = $clone
            ->collection
            ->filter(static fn (DateTime $date) => $date >= $start && $date <= $end)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($map);
    }

    /**
     * @api
     */
    public function before(DateTime $date): self
    {
        $clone = clone $this;
        $map = $clone
            ->collection
            ->filter(static fn (DateTime $d) => $d < $date)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($map);
    }

    /**
     * @api
     */
    public function after(DateTime $date): self
    {
        $clone = clone $this;
        $map = $clone
            ->collection
            ->filter(static fn (DateTime $d) => $d > $date)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($map);
    }
}
