<?php

declare(strict_types=1);

namespace Atournayre\Common\Model;

use Atournayre\Common\VO\Security\PlainPassword;
use Atournayre\Contracts\Security\UserInterface;

abstract class AbstractUser implements UserInterface
{
    protected PlainPassword $plainPassword;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    abstract public function getRoles(): array;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    abstract public function getPassword(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    abstract public function getSalt(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    abstract public function getUsername(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    abstract public function identifier(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function eraseCredentials(): void
    {
        $this->plainPassword = PlainPassword::asNull();
    }
}
