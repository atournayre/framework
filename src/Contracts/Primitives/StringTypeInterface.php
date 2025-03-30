<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Primitives;

use Atournayre\Primitives\BoolEnum;

interface StringTypeInterface
{
    public static function of(string $value): StringTypeInterface;

    public function toString(): string;

    public function __toString(): string;

    public function equalsTo(string|StringTypeInterface $value): BoolEnum;
}
