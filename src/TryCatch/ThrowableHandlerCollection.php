<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\TryCatch\ThrowableHandlerCollectionInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerInterface;

/**
 * Class ThrowableHandlerCollection.
 *
 * Collection of throwable handlers.
 */
final class ThrowableHandlerCollection implements ThrowableHandlerCollectionInterface
{
    /**
     * @param array<ThrowableHandlerInterface> $handlers The collection of handlers
     */
    public function __construct(
        private array $handlers = [],
    )
    {
    }

    /**
     * @param array<ThrowableHandlerInterface> $handlers The collection of handlers
     */
    public static function new(
        array $handlers = [],
    ): self
    {
        return new self(
            handlers: $handlers,
        );
    }

    /**
     * {@inheritdoc}
     */
    public function add(mixed $value, ?\Closure $callback = null): self
    {
        if (!$value instanceof ThrowableHandlerInterface) {
            throw InvalidArgumentException::new('Value must be an instance of ThrowableHandlerInterface');
        }

        $this->handlers[] = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addWithCallback(mixed $value, \Closure $callback): self
    {
        return $this->add($value);
    }

    /**
     * {@inheritdoc}
     */
    public function remove($keys): self
    {
        if (is_int($keys)) {
            unset($this->handlers[$keys]);
            return $this;
        }

        if (is_array($keys) || $keys instanceof \Traversable) {
            foreach ($keys as $key) {
                unset($this->handlers[$key]);
            }
            return $this;
        }

        throw InvalidArgumentException::new('Keys must be an integer, array, or Traversable');
    }

    /**
     * {@inheritdoc}
     */
    public function findHandlerFor(\Throwable $throwable): ?ThrowableHandlerInterface
    {
        foreach ($this->handlers as $handler) {
            if ($handler->canHandle($throwable)) {
                return $handler;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function hasHandlerFor(\Throwable $throwable): bool
    {
        return $this->findHandlerFor($throwable) !== null;
    }
}
