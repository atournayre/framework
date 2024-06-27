<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Aimeos\Map;
use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection\CollectionTrait;

final class EmailAddressCollection  implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    public static function elementType(): string
    {
        return EmailAddress::class;
    }

    use CollectionTrait;

    /**
     * @api
     *
     * @param array<string> $emails
     *
     * @return EmailAddressCollection<T>
     */
    public static function fromArray(array $emails): self
    {
        $map = Map::from($emails)
            ->each(static fn (string $email) => EmailAddress::of($email))
            ->toArray()
        ;

        return EmailAddressCollection::asList($map);
    }

    public function toLog(): array
    {
        return $this->toMap()
            ->map(fn (EmailAddress $email) => $email->toLog())
            ->toArray()
        ;
    }
}
