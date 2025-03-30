<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\Memory;

use Atournayre\Contracts\Common\VO\MemoryInInterface\MemoryInInterface;

final readonly class MemoryIn implements MemoryInInterface
{
    private function __construct(
        private int $bytes,
        private int $kiloByte,
    ) {
    }

    public static function of(int $bytes, int $kiloByte): self
    {
        return new self($bytes, $kiloByte);
    }

    public function kilobytes(): float
    {
        return $this->bytes / $this->kiloByte;
    }

    public function megabytes(): float
    {
        return $this->kilobytes() / $this->kiloByte;
    }

    public function gigabytes(): float
    {
        return $this->megabytes() / $this->kiloByte;
    }

    public function terabytes(): float
    {
        return $this->gigabytes() / $this->kiloByte;
    }
}
