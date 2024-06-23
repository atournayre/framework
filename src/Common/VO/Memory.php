<?php

declare(strict_types=1);

namespace Atournayre\Common\VO;

use Aimeos\Map;

final class Memory
{
    private const KB = 1024;

    private int $bytes;

    private function __construct(int $bytes)
    {
        $this->bytes = $bytes;
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

    /**
     * @api
     */
    public function inKilobytes(): float
    {
        return $this->bytes / self::KB;
    }

    /**
     * @api
     */
    public function inMegabytes(): float
    {
        return $this->inKilobytes() / self::KB;
    }

    /**
     * @api
     */
    public function inGigabytes(): float
    {
        return $this->inMegabytes() / self::KB;
    }

    /**
     * @api
     */
    public function inTerabytes(): float
    {
        return $this->inGigabytes() / self::KB;
    }

    /**
     * @api
     */
    public function humanReadable(): string
    {
        $units = Map::from(['B', 'KB', 'MB', 'GB', 'TB']);
        $value = $this->bytes;
        $unit = 0;

        while ($value >= self::KB && $unit < $units->count() - 1) {
            $value /= self::KB;
            ++$unit;
        }

        return round($value, 2).' '.$units[$unit];
    }
}
