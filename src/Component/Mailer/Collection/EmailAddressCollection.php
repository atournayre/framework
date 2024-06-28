<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Aimeos\Map;
use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection\CollectionTrait;

/**
 * @implements \ArrayAccess<int|string, EmailAddress>
 */
final class EmailAddressCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return EmailAddress::class;
    }

    /**
     * @api
     *
     * @param array<string> $emails
     */
    public static function fromArray(array $emails): self
    {
        $map = Map::from($emails)
            ->each(static fn (string $email) => EmailAddress::of($email))
            ->toArray()
        ;

        return EmailAddressCollection::asList($map);
    }

    /**
     * @return array<string, mixed>
     */
    public function toLog(): array
    {
        return $this->toMap()
            ->map(fn (EmailAddress $email) => $email->toLog())
            ->toArray()
        ;
    }
}
