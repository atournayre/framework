<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures;

use Atournayre\Primitives\Collection\TypedCollection;
use Webmozart\Assert\Assert;

/**
 * @extends TypedCollection<Person>
 *
 * @method PeopleMustBeMap add(Person $value)
 * @method Person[]        values()
 * @method Person          first()
 * @method Person          last()
 */
final class PeopleMustBeMap extends TypedCollection
{
    protected static string $type = Person::class;

    protected function validateElement($value): void
    {
        Assert::lengthBetween($value->name, 1, 30);
    }

    protected function validate(): void
    {
        Assert::isMap($this->collection, \sprintf('Expected a map - associative array of %s', static::$type));
        Assert::allIsAnyOf($this->collection, [static::$type], 'Expected a map of %2$s. Got: %s');
    }
}
