<?php

declare(strict_types=1);

namespace Atournayre\Common\Model;

use Atournayre\Null\NullTrait;

final class DefaultUser extends AbstractUser
{
    use NullTrait;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getRoles(): array
    {
        return [];
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getPassword(): string
    {
        return '';
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getSalt(): string
    {
        return '';
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getUsername(): string
    {
        return '';
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function identifier(): string
    {
        return '';
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function asNull(): self
    {
        return (new self())
            ->toNullable()
        ;
    }
}
