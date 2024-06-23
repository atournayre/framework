<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\TypedCollection;

/**
 * @template T
 *
 * @extends TypedCollection<EmailContact>
 *
 * @method EmailContactCollection add(EmailContact $value, ?\Closure $callback = null)
 * @method EmailContactCollection set($key, EmailContact $value, ?\Closure $callback = null)
 * @method EmailContact[]         values()
 * @method EmailContact           first()
 * @method EmailContact           last()
 */
final class EmailContactCollection extends TypedCollection implements LoggableInterface
{
    protected static string $type = EmailContact::class;

    /**
     * @param array<EmailContact> $collection
     *
     * @return self<T>
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, EmailContactCollection::$type);

        return new self($collection);
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
