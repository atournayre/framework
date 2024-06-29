<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Wrapper\Collection;

trait ListTrait
{
    /**
     * @api
     *
     * @param array<int, mixed> $collection
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, static::$type);

        return new self(Collection::of($collection));
    }
}
