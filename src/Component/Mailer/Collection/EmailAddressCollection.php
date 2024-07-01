<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Contracts\Collection\ListInterface;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

final class EmailAddressCollection implements ListInterface, MapInterface
{
    use CollectionTrait;

    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, EmailAddress::class);

        return new self(Collection::of($collection));
    }

    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, EmailAddress::class);

        return new self(Collection::of($collection));
    }

    /**
     * @api
     *
     * @param array<string> $emails
     */
    public static function fromArray(array $emails): self
    {
        $map = Collection::of($emails)
            ->each(static fn (string $email) => EmailAddress::of($email))
            ->toArray()
        ;

        return EmailAddressCollection::asList($map);
    }
}
