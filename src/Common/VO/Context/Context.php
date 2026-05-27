<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\Context;

use Atournayre\Common\Model\DefaultUser;
use Atournayre\Contracts\Context\ContextInterface;
use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Contracts\Security\UserInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\DateTime;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class Context implements ContextInterface, LoggableInterface
{
    use NullTrait;

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(
        private readonly UserInterface $user,
        private readonly DateTimeInterface $createdAt,
    ) {
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asNull(): self
    {
        return (new self(DefaultUser::asNull(), DateTime::asNull()))
            ->toNullable()
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function create(UserInterface $user, \DateTimeInterface $createdAt): self
    {
        return new self($user, DateTime::of($createdAt));
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function user(): UserInterface
    {
        return $this->user;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function createdAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return array<string, mixed>
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toLog(): array
    {
        return [
            'user' => $this->user->identifier(),
            'createdAt' => $this->createdAt->toDateTime()->format('Y-m-d H:i:s'),
        ];
    }
}
