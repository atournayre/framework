<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\CollectionTrait;

final class TemplateContextCollection implements MapInterface
{
    use CollectionTrait;

    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, 'mixed');

        return new self(Collection::of($collection));
    }

    /**
     * @api
     * @param mixed|null $offset
     */
    public function has($offset): BoolEnum
    {
        return $this->collection
            ->has($offset)
        ;
    }
}
