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

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class ValidationCollection implements AsMapInterface
{
    use CollectionTrait;

    /**
     * @param array<string, string|mixed> $collection
     *
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, 'string');

        return new self(Collection::of($collection));
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isValid(): BoolEnum
    {
        return $this->hasNoElement();
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function throwException(string $glue = ', '): void
    {
        if ($this->hasNoElement()->yes()) {
            return;
        }

        RuntimeException::new($this->toString($glue))->throw();
    }
}
