<?php

declare(strict_types=1);

namespace Atournayre\Common\Model;

use Atournayre\Common\VO\PlainPassword;
use Atournayre\Contracts\Security\UserInterface;
use Atournayre\Null\NullTrait;

abstract class AbstractUser implements UserInterface
{
    use NullTrait;

    protected PlainPassword $plainPassword;

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
