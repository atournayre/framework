<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\Collection\AsListInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerCollectionInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerInterface;

/**
 * Class ThrowableHandlerCollection.
 *
 * Collection of throwable handlers.
 */
final class ThrowableHandlerCollection implements ThrowableHandlerCollectionInterface, AsListInterface
{
    /**
     * @param array<ThrowableHandlerInterface> $collection The collection of handlers
     */
    public function __construct(
        private array $collection = [],
    ) {
    }

    /**
     * @param array<ThrowableHandlerInterface> $collection
     */
    public static function asList(
        array $collection = [],
    ): self {
        return new self(
            collection: $collection,
        );
    }

    public function add(mixed $value, ?\Closure $callback = null): self
    {
        if (!$value instanceof ThrowableHandlerInterface) {
            throw InvalidArgumentException::new('Value must be an instance of ThrowableHandlerInterface');
        }

        $this->collection[] = $value;

        return $this;
    }

    public function addWithCallback(mixed $value, \Closure $callback): self
    {
        return $this->add($value);
    }

    public function remove($keys): self
    {
        if (is_int($keys)) {
            unset($this->collection[$keys]);

            return $this;
        }

        if (is_iterable($keys)) {
            foreach ($keys as $key) {
                unset($this->collection[$key]);
            }

            return $this;
        }

        throw InvalidArgumentException::new('Keys must be an integer, array, or Traversable');
    }

    public function findHandlerFor(\Throwable $throwable): ?ThrowableHandlerInterface
    {
        foreach ($this->collection as $handler) {
            if ($handler->canHandle($throwable)) {
                return $handler;
            }
        }

        return null;
    }

    public function hasHandlerFor(\Throwable $throwable): bool
    {
        return $this->findHandlerFor($throwable) instanceof ThrowableHandlerInterface;
    }
}
