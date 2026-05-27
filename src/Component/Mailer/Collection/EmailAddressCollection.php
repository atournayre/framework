<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Contracts\Collection\AsListInterface;
use Atournayre\Contracts\Collection\AsMapInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class EmailAddressCollection implements AsListInterface, AsMapInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, EmailAddress::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, EmailAddress::class);

        return new self(Collection::of($collection));
    }

    /**
     * @param array<string> $emails
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function fromArray(array $emails): self
    {
        $map = Collection::of($emails)
            ->each(static fn (string $email) => EmailAddress::of($email))
            ->toArray()
        ;

        return EmailAddressCollection::asList($map);
    }
}
