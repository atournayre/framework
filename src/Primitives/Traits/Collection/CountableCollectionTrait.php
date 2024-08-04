<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Int_;

trait CountableCollectionTrait
{
    /**
     * Returns the total number of elements.
     *
     * @api
     */
    public function count(): Int_
    {
        $count = $this->collection->count();

        return Int_::of($count);
    }

    /**
     * Counts how often the same values are in the map.
     *
     * @param callable|null $callback Function with (value, key) parameters which returns the value to use for counting
     *
     * @api
     */
    public function countBy(?callable $callback = null): self
    {
        $countBy = $this->collection
            ->countBy($callback)
        ;

        return new self($countBy);
    }

    public function atLeastOneElement(): BoolEnum
    {
        return $this->count()
            ->greaterThan(0)
        ;
    }

    public function hasSeveralElements(): BoolEnum
    {
        return $this->count()
            ->greaterThan(1)
        ;
    }

    public function hasNoElement(): BoolEnum
    {
        return $this->count()
            ->equalsTo(0)
        ;
    }

    public function hasOneElement(): BoolEnum
    {
        return $this->count()
            ->equalsTo(1)
        ;
    }

    public function hasXElements(int $int): BoolEnum
    {
        return $this->count()
            ->equalsTo($int)
        ;
    }
}
