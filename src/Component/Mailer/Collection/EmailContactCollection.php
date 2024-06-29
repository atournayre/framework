<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection\CollectionTrait;
use Atournayre\Primitives\Collection\ListTrait;

final class EmailContactCollection implements LoggableInterface
{
    use CollectionTrait;
    use ListTrait;

    protected static string $type = EmailContact::class;

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
}
