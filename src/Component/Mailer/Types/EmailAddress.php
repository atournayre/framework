<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\Types\Domain;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * Represents an e-mail address.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class EmailAddress
{
    use StringTypeTrait;

    /**
     * @throws ThrowableInterface
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function of(string $value): self
    {
        Assert::email($value, 'Expected a value to be a valid e-mail address. Got: %s');

        return new self(StringType::of($value));
    }

    /**
     * @api
     *
     * @param string|EmailAddress $email
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function is($email): BoolEnum
    {
        return $this->equalsTo($email);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function username(): EmailUserName
    {
        $emailUserName = $this->value
            ->split('@')[0]->toString()
        ;

        return EmailUserName::of($emailUserName);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function usernameIs(string $username): BoolEnum
    {
        return EmailUserName::of($username)
            ->equalsTo($this->username())
        ;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function domain(): Domain
    {
        $domain = $this->value
            ->split('@')[1]->toString()
        ;

        return Domain::of($domain);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function domainIs(string $domain): BoolEnum
    {
        return Domain::of($domain)
            ->equalsTo($this->domain())
        ;
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isDeliverable(): BoolEnum
    {
        $domain = $this->domain()->toString();
        $checkdnsrr = checkdnsrr($domain);

        return BoolEnum::fromBool($checkdnsrr);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toCanonical(): self
    {
        // remove the string after the '+' character including it and before the '@' character, using a regular expression
        $stringEmail = $this->value
            ->replaceMatches('/\+.*(?=@)/', '')
        ;

        return new self($stringEmail);
    }
}
