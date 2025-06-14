<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Common\Assert\Assert;
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

    /**
     * @return ThrowableHandlerInterface<mixed>
     */
    public function findHandlerFor(\Throwable $throwable): ThrowableHandlerInterface
    {
        foreach ($this->collection->toArray() as $handler) {
            if ($handler->canHandle($throwable)) {
                return $handler;
            }
        }

        return NullThrowableHandler::new();
    }
}
