<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Primitives\Collection\TypedCollection;

/**
 * @template T
 *
 * @extends TypedCollection<T>
 *
 * @method TemplateContextCollection add(string $value, ?\Closure $callback = null)
 * @method TemplateContextCollection set($key, string $value, ?\Closure $callback = null)
 * @method mixed[]                   values()
 * @method mixed                     first()
 * @method mixed                     last()
 */
final class TemplateContextCollection extends TypedCollection
{
    protected static string $type = 'mixed';

    /**
     * @param array<T> $collection
     *
     * @return self<T>
     *
     * @throws \RuntimeException
     */
    public static function asList(array $collection): self
    {
        throw new \RuntimeException(sprintf('Use %s::asMap() instead.', self::class));
    }

    /**
     * @param array<T> $collection
     *
     * @return self<T>
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, TemplateContextCollection::$type);

        return new self($collection);
    }
}
