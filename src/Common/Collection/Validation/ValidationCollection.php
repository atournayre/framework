<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Validation;

use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\CollectionTrait;

/**
 * @implements \ArrayAccess<int|string, string>
 */
final class ValidationCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    /**
     * @return string
     */
    public static function elementType(): string
    {
        return 'string';
    }

    /**
     * @throws \RuntimeException
     */
    public static function asList($elements = []): self
    {
        throw new \RuntimeException(sprintf('Use %s::asMap() instead.', self::class));
    }

    /**
     * @api
     */
    public function isValid(): BoolEnum
    {
        return $this->hasNoElement();
    }

    /**
     * @return array<string>
     */
    public function toLog(): array
    {
        return $this->values();
    }
}
