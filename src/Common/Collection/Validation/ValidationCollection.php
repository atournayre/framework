<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Validation;

use Atournayre\Common\Assert\Assert;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\TypedCollection;

/**
 * @extends TypedCollection<string>
 *
 * @method ValidationCollection add(string $value, ?\Closure $callback = null)
 * @method ValidationCollection set($key, string $value, ?\Closure $callback = null)
 * @method string[]             values()
 * @method string               first()
 * @method string               last()
 */
final class ValidationCollection extends TypedCollection
{
    /**
     * @throws \RuntimeException
     */
    public static function asList(array $collection): self
    {
        throw new \RuntimeException(sprintf('Use %s::asMap() instead.', self::class));
    }

    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, ValidationCollection::$type);

        return new self($collection);
    }

    public function isValid(): BoolEnum
    {
        return BoolEnum::fromBool($this->hasNoElement());
    }
}
