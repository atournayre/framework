<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Collection\AsMapInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class TagCollection implements LoggableInterface, AsMapInterface
{
    use CollectionTrait;

    private const TAG_MIN_LENGTH = 3;

    private const TAG_MAX_LENGTH = 5;

    /**
     * @param array<string, mixed> $collection
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, 'string');

        $collection1 = Collection::of($collection)
            ->each(fn (string $tag) => self::validateElement($tag))
        ;

        return new self($collection1);
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toLog(): array
    {
        return $this->collection
            ->toArray()
        ;
    }
}
