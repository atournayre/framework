<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Primitives\Collection\TypedCollection;
use Atournayre\Wrapper\Collection;

/**
 * @template T
 *
 * @extends TypedCollection<EmailAddress>
 *
 * @method EmailAddressCollection add(EmailAddress $value, ?\Closure $callback = null)
 * @method EmailAddressCollection set($key, EmailAddress $value, ?\Closure $callback = null)
 * @method EmailAddress[]         values()
 * @method EmailAddress           first()
 * @method EmailAddress           last()
 */
final class EmailAddressCollection extends TypedCollection
{
    protected static string $type = EmailAddress::class;

    /**
     * @param array<EmailAddress> $collection
     *
     * @return self<T>
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, EmailAddressCollection::$type);

        return new self($collection);
    }

    /**
     * @api
     *
     * @param array<string> $emails
     *
     * @return EmailAddressCollection<T>
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
