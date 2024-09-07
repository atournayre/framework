<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CollectionValidationInterface;
use Atournayre\Primitives\Collection;

trait CollectionAsListTrait
{
    /**
     * @throws \Exception
     */
    public static function asList(array $collection, int $precision): self
    {
        $self = new self(Collection::of($collection), $precision);

        if ($self instanceof CollectionValidationInterface) { // @phpstan-ignore-line
            $self->validateCollection();
        }

        return $self;
    }
}
