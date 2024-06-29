<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Primitives\Collection\CollectionTrait;
use Atournayre\Primitives\Collection\ListTrait;
use Atournayre\Primitives\Collection\MapTrait;
use Atournayre\Wrapper\Collection;

final class EmailAddressCollection
{
    use CollectionTrait;
    use ListTrait;
    use MapTrait;

    protected static string $type = EmailAddress::class;

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
