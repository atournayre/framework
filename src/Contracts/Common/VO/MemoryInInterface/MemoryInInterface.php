<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\VO\MemoryInInterface;

interface MemoryInInterface
{
    public static function of(int $bytes, int $kiloByte): self;

    public function kilobytes(): float;

    public function megabytes(): float;

    public function gigabytes(): float;

    public function terabytes(): float;
}
