<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\Collection\AsListInterface;
use Atournayre\Contracts\Collection\ToArrayInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerCollectionInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\Collection\Add;
use Atournayre\Primitives\Traits\Collection\ToArray;

/**
 * Class ThrowableHandlerCollection.
 *
 * Collection of throwable handlers.
 */
final class ThrowableHandlerCollection implements ThrowableHandlerCollectionInterface, AsListInterface, ToArrayInterface
{
    use \Atournayre\Primitives\Traits\Collection;
    use Add;
    use ToArray;

    /**
     * @param array<ThrowableHandlerInterface> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asList(
        array $collection = [],
    ): self {
        Assert::allIsInstanceOf($collection, ThrowableHandlerCollectionInterface::class);

        return new self(
            collection: Collection::of($collection),
        );
    }

    public function findHandlerFor(\Throwable $throwable): ?ThrowableHandlerInterface
    {
        foreach ($this->collection->toArray() as $handler) {
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
