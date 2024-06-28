<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\Types\Domain;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\StringTypeTrait;

/**
 * Represents an e-mail address.
 */
final class EmailAddress implements LoggableInterface
{
    use StringTypeTrait;

    /**
     * @api
     */
    public static function of(string $value): self
    {
        Assert::email($value, 'Expected a value to be a valid e-mail address. Got: %s');

        return new self(StringType::of($value));
    }

    /**
     * @api
     *
     * @param string|EmailAddress $email
     */
    public function is($email): BoolEnum
    {
        return $this->equalsTo($email);
    }

    /**
     * @api
     */
    public function username(): EmailUserName
    {
        $emailUserName = $this->value
            ->split('@')[0]->toString()
        ;

        return EmailUserName::of($emailUserName);
    }

    /**
     * @api
     */
    public function usernameIs(string $username): BoolEnum
    {
        return EmailUserName::of($username)
            ->equalsTo($this->username())
        ;
    }

    /**
     * @api
     */
    public function domain(): Domain
    {
        $domain = $this->value
            ->split('@')[1]->toString()
        ;

        return Domain::of($domain);
    }

    /**
     * @api
     */
    public function domainIs(string $domain): BoolEnum
    {
        return Domain::of($domain)
            ->equalsTo($this->domain())
        ;
    }

    /**
     * @api
     */
    public function isDeliverable(): BoolEnum
    {
        $domain = $this->domain()->toString();
        $checkdnsrr = checkdnsrr($domain);

        return BoolEnum::fromBool($checkdnsrr);
    }

    /**
     * @api
     */
    public function toCanonical(): self
    {
        // remove the string after the '+' character including it and before the '@' character, using a regular expression
        $stringEmail = $this->value
            ->replaceMatches('/\+.*(?=@)/', '')
        ;

        return new self($stringEmail);
    }

    /**
     * @return array<string, string>
     */
    public function toLog(): array
    {
        return [
            'email' => $this->value->toString(),
        ];
    }
}
