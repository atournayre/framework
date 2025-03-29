<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Collection\ListInterface;
use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Exception\RuntimeException;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

final class DateTimeCollection implements ListInterface
{
    use CollectionTrait;

    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, DateTimeInterface::class);

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
            ->usort(static fn (DateTimeInterface $a, DateTimeInterface $b) => $a <=> $b)
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
            ->usort(static fn (DateTimeInterface $a, DateTimeInterface $b) => $b <=> $a)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($values);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function mostRecent(): DateTimeInterface
    {
        return $this->sortDesc()
            ->collection
            ->first()
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function oldest(): DateTimeInterface
    {
        try {
            return $this
                ->sortAsc()
                ->collection
                ->first()
            ;
        } catch (\Throwable $e) {
            RuntimeException::fromThrowable($e)->throw();
        }
    }

    /**
     * @api
     */
    public function between(DateTimeInterface $start, DateTimeInterface $end): self
    {
        $clone = clone $this;
        $map = $clone
            ->collection
            ->filter(static fn (DateTimeInterface $date) => $date >= $start && $date <= $end)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($map);
    }

    /**
     * @api
     */
    public function before(DateTimeInterface $date): self
    {
        $clone = clone $this;
        $map = $clone
            ->collection
            ->filter(static fn (DateTimeInterface $d) => $d < $date)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($map);
    }

    /**
     * @api
     */
    public function after(DateTimeInterface $date): self
    {
        $clone = clone $this;
        $map = $clone
            ->collection
            ->filter(static fn (DateTimeInterface $d) => $d > $date)
            ->values()
            ->toArray()
        ;

        return DateTimeCollection::asList($map);
    }
}
