<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\Context;

use Atournayre\Common\Model\DefaultUser;
use Atournayre\Contracts\Context\ContextInterface;
use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Contracts\Security\UserInterface;
use Atournayre\Exception\RuntimeException;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\DateTime;

final class Context implements ContextInterface, LoggableInterface
{
    use NullTrait;

    private UserInterface $user;

    private DateTimeInterface $createdAt;

    private function __construct(
        UserInterface $user,
        DateTimeInterface $createdAt,
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
     * @throws ThrowableInterface
     */
    public static function create(UserInterface $user, \DateTimeInterface $createdAt): self
    {
        try {
            return new self($user, DateTime::of($createdAt));
        } catch (\Exception $exception) {
            RuntimeException::fromThrowable($exception)->throw();
        }
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
