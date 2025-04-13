<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Contracts\Collection\AsMapInterface;
use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

final class TemplateContextCollection implements AsMapInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, 'mixed');

        return new self(Collection::of($collection));
    }

    /**
     * @api
     *
     * @param mixed|null $offset
     */
    public function has($offset): BoolEnum
    {
        return $this->collection
            ->has($offset)
        ;
    }
}
