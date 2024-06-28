<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection\CollectionTrait;

/**
 * @implements \ArrayAccess<string, string>
 */
final class TagCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return 'string';
    }

    private const TAG_MIN_LENGTH = 3;

    private const TAG_MAX_LENGTH = 5;

    /**
     * @throws \RuntimeException
     */
    public static function asList($elements = []): self
    {
        throw new \RuntimeException(sprintf('Use %s::asMap() instead.', self::class));
    }

    /**
     * @param string $value
     */
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
