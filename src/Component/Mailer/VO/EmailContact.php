<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\VO;

use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Component\Mailer\Types\EmailName;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;

final class EmailContact implements LoggableInterface
{
    private EmailAddress $emailAddress;

    private EmailName $emailName;

    private function __construct(
        EmailAddress $email,
        EmailName $name,
    ) {
        $this->emailName = $name;
        $this->emailAddress = $email;
    }

    /**
     * @api
     */
    public static function create(EmailAddress $emailAddress, EmailName $emailName): self
    {
        return new self($emailAddress, $emailName);
    }

    /**
     * @api
     */
    public function email(): EmailAddress
    {
        return $this->emailAddress;
    }

    /**
     * @api
     */
    public function name(): EmailName
    {
        return $this->emailName;
    }

    /**
     * @api
     */
    public function equalsTo(EmailContact $emailContact): BoolEnum
    {
        $emailAddressSameAsContact = $this->emailAddress
            ->equalsTo($emailContact->email())
            ->isTrue()
        ;

        $emailNameSameAsContact = $this->emailName
            ->equalsTo($emailContact->name())
            ->isTrue()
        ;

        $equalTo = $emailAddressSameAsContact
            && $emailNameSameAsContact;

        return BoolEnum::fromBool($equalTo);
    }

    /**
     * @return array<string, string>
     */
    public function toLog(): array
    {
        return [
            'email' => $this->emailAddress->toString(),
            'name' => $this->emailName->toString(),
        ];
    }
}
