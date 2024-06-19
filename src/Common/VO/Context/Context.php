<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\Context;

use Atournayre\Common\Model\DefaultUser;
use Atournayre\Common\VO\DateTime\DateTime;
use Atournayre\Contracts\Context\ContextInterface;
use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Contracts\Security\UserInterface;
use Atournayre\Null\NullTrait;

final class Context implements ContextInterface, LoggableInterface, NullableInterface
{
    use NullTrait;

    private UserInterface $user;

    private DateTime $createdAt;

    private function __construct(
        UserInterface $user,
        DateTime $createdAt
    ) {
        $this->createdAt = $createdAt;
        $this->user = $user;
    }

    public static function asNull(): self
    {
        return (new self(DefaultUser::asNull(), DateTime::asNull()))
            ->toNullable()
        ;
    }

    /**
     * @throws \Exception
     */
    public static function create(UserInterface $user, \DateTimeInterface $createdAt): self
    {
        return new self($user, DateTime::fromInterface($createdAt));
    }

    public function user(): UserInterface
    {
        return $this->user;
    }

    public function createdAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return array<string, mixed>
     */
    public function toLog(): array
    {
        return [
            'user' => $this->user->identifier(),
            'createdAt' => $this->createdAt->toDateTime()->format('Y-m-d H:i:s'),
        ];
    }
}
