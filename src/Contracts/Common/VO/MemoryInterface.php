<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\VO;

use Atournayre\Primitives\BoolEnum;

interface MemoryInterface
{
    public static function fromBytes(int $bytes): self;

    public function asIs(): int;

    public function humanReadable(): string;

    public function equalsTo(int $size): BoolEnum;
}
