<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Wrapper\Collection;

trait MapTrait
{
    /**
     * @api
     *
     * @param array<string, mixed> $collection
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, static::$type);

        return new self(Collection::of($collection));
    }

    /**
     * @param mixed|null $value
     *
     * @throws \Exception
     */
    public function set(string $offset, $value, ?\Closure $callback = null): self
    {
        if ($callback instanceof \Closure && !$callback($value)) {
            return self::asMap($this->collection->toArray());
        }

        $collection = $this->collection;
        $collection->offsetSet($offset, $value);

        return self::asMap($collection->toArray());
    }
}
