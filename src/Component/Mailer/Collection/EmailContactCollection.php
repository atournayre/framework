<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\CollectionTrait;

final class EmailContactCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    public static function elementType(): string
    {
        return EmailContact::class;
    }

    use CollectionTrait;

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
