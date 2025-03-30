<?php

declare(strict_types=1);

namespace Atournayre\Common\VO;

use Atournayre\Common\VO\Memory\MemoryIn;
use Atournayre\Contracts\Common\VO\MemoryInInterface\MemoryInInterface;
use Atournayre\Contracts\Common\VO\MemoryInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;

final readonly class Memory implements MemoryInterface
{
    private function __construct(
        private int $bytes,
    ) {
    }

    private function kb(): int
    {
        return 1024;
    }

    /**
     * @api
     */
    public static function fromBytes(int $bytes): self
    {
        return new self($bytes);
    }

    /**
     * @api
     */
    public function asIs(): int
    {
        return $this->bytes;
    }

    public function in(): MemoryInInterface
    {
        return MemoryIn::of($this->bytes, $this->kb());
    }

    /**
     * @api
     *
     * @deprecated Use in()->kilobytes() instead
     */
    public function inKilobytes(): float
    {
        return $this->in()->kilobytes();
    }

    /**
     * @api
     *
     * @deprecated Use in()->megabytes() instead
     */
    public function inMegabytes(): float
    {
        return $this->in()->megabytes();
    }

    /**
     * @api
     *
     * @deprecated Use in()->gigabytes() instead
     */
    public function inGigabytes(): float
    {
        return $this->in()->gigabytes();
    }

    /**
     * @api
     *
     * @deprecated Use in()->terabytes() instead
     */
    public function inTerabytes(): float
    {
        return $this->in()->terabytes();
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function humanReadable(): string
    {
        $units = Collection::of(['B', 'KB', 'MB', 'GB', 'TB']);
        $value = $this->bytes;
        $unit = 0;

        while ($value >= $this->kb() && $unit < $units->count()->value() - 1) {
            $value /= $this->kb();
            ++$unit;
        }

        return round($value, 2).' '.$units->get($unit);
    }

    public function equalsTo(int $size): BoolEnum
    {
        $isEquals = $this->bytes === $size;

        return BoolEnum::fromBool($isEquals);
    }
}
