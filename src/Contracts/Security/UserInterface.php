<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Security;

use Atournayre\Contracts\Null\NullableInterface;

interface UserInterface extends NullableInterface
{
    // @phpstan-ignore-next-line
    public function getRoles();

    // @phpstan-ignore-next-line
    public function getPassword();

    // @phpstan-ignore-next-line
    public function getSalt();

    // @phpstan-ignore-next-line
    public function getUsername();

    // @phpstan-ignore-next-line
    public function eraseCredentials();

    public function identifier(): string;
}
