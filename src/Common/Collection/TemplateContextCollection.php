<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection\CollectionTrait;

final class TemplateContextCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return 'mixed';
    }

    /**
     * @return self<T>
     *
     * @throws \RuntimeException
     */
    public static function asList($elements = []): self
    {
        throw new \RuntimeException(sprintf('Use %s::asMap() instead.', self::class));
    }

    public function toLog(): array
    {
        return $this->toMap()->toArray();
    }
}
