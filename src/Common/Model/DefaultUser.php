<?php

declare(strict_types=1);

namespace Atournayre\Common\Model;

use Atournayre\Null\NullTrait;

final class DefaultUser extends AbstractUser
{
    use NullTrait;

    // @phpstan-ignore-next-line
    public function getRoles(): array
    {
        return [];
    }

    public function getPassword(): string
    {
        return '';
    }

    public function getSalt(): string
    {
        return '';
    }

    public function getUsername(): string
    {
        return '';
    }

    public function identifier(): string
    {
        return '';
    }

    public static function asNull(): self
    {
        return (new self())
            ->toNullable()
        ;
    }
}
