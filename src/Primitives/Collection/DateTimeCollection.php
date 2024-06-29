<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\VO\DateTime\DateTime;

/**
 * @method DateTime           first()
 * @method DateTime           last()
 * @method DateTimeCollection values()
 */
class DateTimeCollection
{
    use CollectionTrait;
    use MapTrait;
    use ListTrait;

    protected static string $type = DateTime::class;

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
