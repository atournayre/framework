<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\CollectionTrait;

/**
 * @template TKey of array-key
 * @template TValue of EmailContact
 *
 * @implements CollectionInterface<TKey, TValue>
 * @implements \ArrayAccess<TKey, TValue>
 */
final class EmailContactCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return EmailContact::class;
    }

    /**
     * @api
     */
    public function contains(EmailContact $replyToAddress): BoolEnum
    {
        $contains = $this->toArrayCollection()
            ->contains($replyToAddress)
        ;

        return BoolEnum::fromBool($contains);
    }

    /**
     * @return array<array<string, string>>
     */
    public function toLog(): array
    {
        return $this->toMap()
            ->map(fn (EmailContact $emailContact) => $emailContact->toLog())
            ->toArray()
        ;
    }
}
