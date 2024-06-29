<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Contracts\Collection\ListInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\CollectionTrait;

final class EmailContactCollection implements LoggableInterface, ListInterface
{
    use CollectionTrait;

    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, EmailContact::class);

        return new self(Collection::of($collection));
    }

    /**
     * @return array<array<string, string>>
     */
    public function toLog(): array
    {
        return $this->collection
            ->map(fn (EmailContact $emailContact) => $emailContact->toLog())
            ->toArray()
        ;
    }

    /**
     * @api
     * @param mixed|null $key
     * @param string|null $operator
     * @param mixed|null $value
     * @return BoolEnum
     */
    public function contains($key, ?string $operator = null, $value = null): BoolEnum
    {
        return $this->collection->contains($key, $operator, $value);
    }
}
