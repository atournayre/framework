<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Validation;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\AsMapInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

final class ValidationCollection implements AsMapInterface
{
    use CollectionTrait;

    /**
     * @param array<string, string|mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, 'string');

        return new self(Collection::of($collection));
    }

    public function isValid(): BoolEnum
    {
        return $this->hasNoElement();
    }

    /**
     * @api
     */
    public function toString(string $glue = ', '): string
    {
        return $this->collection
            ->join($glue)
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function throwException(string $glue = ', '): void
    {
        if ($this->hasNoElement()->yes()) {
            return;
        }

        RuntimeException::new($this->toString($glue))->throw();
    }
}
