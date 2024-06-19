<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Security;

interface SecurityInterface
{
    public function getUser(): UserInterface;
}
