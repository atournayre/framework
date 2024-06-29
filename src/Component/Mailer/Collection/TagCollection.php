<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection\CollectionTrait;
use Atournayre\Primitives\Collection\MapTrait;
use Atournayre\Wrapper\Collection;

final class TagCollection implements LoggableInterface
{
    use CollectionTrait;
    use MapTrait;

    protected static string $type = 'string';

    private const TAG_MIN_LENGTH = 3;

    private const TAG_MAX_LENGTH = 5;

    /**
     * @param array<string, mixed> $collection
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, self::$type);

        return (new self(Collection::of($collection)))
            ->validate(fn (string $tag) => self::validateElement($tag))
        ;
    }

    private static function validateElement(string $value): void
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
        return $this->collection
            ->toArray()
        ;
    }
}
