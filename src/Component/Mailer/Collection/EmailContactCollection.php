<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Contracts\Collection\AsListInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

final class EmailContactCollection implements LoggableInterface, AsListInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, EmailContact::class);

        return new self(Collection::of($collection));
    }

    /**
     * @return array<array<string, string>>
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toLog(): array
    {
        return $this->collection
            ->map(fn (EmailContact $emailContact) => $emailContact->toLog())
            ->toArray()
        ;
    }

    /**
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function contains($key, ?string $operator = null, $value = null): BoolEnum
    {
        return $this->collection->contains($key, $operator, $value);
    }
}
