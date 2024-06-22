<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection\TypedCollection;

/**
 * @extends TypedCollection<string>
 *
 * @method TagCollection add(string $value, ?\Closure $callback = null)
 * @method TagCollection set($key, string $value, ?\Closure $callback = null)
 * @method string[]      values()
 * @method string        first()
 * @method string        last()
 */
final class TagCollection extends TypedCollection implements LoggableInterface
{
    private const TAG_MIN_LENGTH = 3;

    private const TAG_MAX_LENGTH = 5;

    /**
     * @throws \RuntimeException
     */
    public static function asList(array $collection): self
    {
        throw new \RuntimeException(sprintf('Use %s::asMap() instead.', self::class));
    }

    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, TagCollection::$type);

        return new self($collection);
    }

    protected function validateElement($value): void
    {
        Assert::lengthBetween(
            $value,
            self::TAG_MIN_LENGTH,
            self::TAG_MAX_LENGTH,
            sprintf('Tag "%s" length must be between %d and %d characters', $value, self::TAG_MIN_LENGTH, self::TAG_MAX_LENGTH)
        );
    }

    /**
     * @return array<string>
     */
    public function toLog(): array
    {
        return $this->toMap()
            ->toArray()
        ;
    }
}
