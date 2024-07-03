<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Event;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Collection\ListInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

final class AllowedEventsTypesCollection implements ListInterface
{
    use CollectionTrait;

    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, 'string');

        return new self(Collection::of($collection));
    }

    /**
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function contains($key, ?string $operator = null, $value = null): BoolEnum
    {
        return $this->collection
            ->contains($key, $operator, $value)
        ;
    }
}
