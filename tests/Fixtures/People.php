<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures;

use Atournayre\Primitives\Collection\TypedCollection;
use Webmozart\Assert\Assert;

/**
 * @extends TypedCollection<Person>
 *
 * @method People   add(Person $value, ?\Closure $callback = null)
 * @method Person[] values()
 * @method Person   first()
 * @method Person   last()
 */
final class People extends TypedCollection
{
    protected static string $type = Person::class;

    protected function validateElement($value): void
    {
        Assert::lengthBetween($value->name, 1, 30);
    }
}
