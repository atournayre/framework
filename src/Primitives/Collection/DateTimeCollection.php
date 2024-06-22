<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\DateTime\DateTime;

/**
 * @template T
 *
 * @extends TypedCollection<T>
 *
 * @method DateTimeCollection add(DateTime $value, ?\Closure $callback = null)
 * @method DateTimeCollection set($key, DateTime $value, ?\Closure $callback = null)
 * @method DateTime[]         values()
 * @method DateTime           first()
 * @method DateTime           last()
 */
class DateTimeCollection extends TypedCollection
{
    protected static string $type = DateTime::class;

    /**
     * @api
     *
     * @return DateTimeCollection<T>
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, static::$type);

        return new self($collection);
    }

    /**
     * @api
     *
     * @return DateTimeCollection<T>
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, static::$type);

        return new self($collection);
    }

    /**
     * @api
     *
     * @return array<DateTime>
     */
    public function dates(): array
    {
        return $this->values();
    }

    /**
     * @api
     *
     * @return DateTimeCollection<T>
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

        return DateTimeCollection::asList($values);
    }

    /**
     * @api
     *
     * @return DateTimeCollection<T>
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
        return $this->sortDesc()->first();
    }

    /**
     * @api
     */
    public function oldest(): DateTime
    {
        return $this->sortAsc()->first();
    }

    /**
     * @api
     *
     * @return DateTimeCollection<T>
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
     * @return DateTimeCollection<T>
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
     * @return DateTimeCollection<T>
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
}
