<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CollectionValidationInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;

trait CollectionAsMapTrait
{
    /**
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection, int $precision): self
    {
        $self = new self(Collection::of($collection), $precision);

        if ($self instanceof CollectionValidationInterface) { // @phpstan-ignore-line
            $self->validateCollection();
        }

        return $self;
    }
}
