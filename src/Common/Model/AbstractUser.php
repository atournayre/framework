<?php

declare(strict_types=1);

namespace Atournayre\Common\Model;

use Atournayre\Common\VO\Security\PlainPassword;
use Atournayre\Contracts\Security\UserInterface;

abstract class AbstractUser implements UserInterface
{
    protected PlainPassword $plainPassword;

    // @phpstan-ignore-next-line
    abstract public function getRoles(): array;

    abstract public function getPassword(): string;

    abstract public function getSalt(): string;

    abstract public function getUsername(): string;

    abstract public function identifier(): string;

    public function eraseCredentials(): void
    {
        $this->plainPassword = PlainPassword::asNull();
    }
}
