<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use function Symfony\Component\String\u;

class BoolEnum
{
    private const TRUE = 'true';
    private const FALSE = 'false';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromBool(bool $value): self
    {
        return $value ? self::TRUE() : self::FALSE();
    }

    public function asString(): string
    {
        return u($this->value)->lower()->toString();
    }

    public function asInt(): int
    {
        return $this->value === self::TRUE ? 1 : 0;
    }

    public function asBool(): bool
    {
        return $this->value === self::TRUE;
    }

    public function isTrue(): bool
    {
        return $this->value === self::TRUE;
    }

    public function isFalse(): bool
    {
        return $this->value === self::FALSE;
    }

    public function yes(): bool
    {
        return $this->isTrue();
    }

    public function no(): bool
    {
        return $this->isFalse();
    }

    private static function TRUE(): self
    {
        return new self(self::TRUE);
    }

    private static function FALSE(): self
    {
        return new self(self::FALSE);
    }

    /**
     * @throws \Exception
     */
    public function throwIfFalse($message): void
    {
        if ($this->isTrue()) {
            return;
        }

        if (is_string($message)) {
            throw new \InvalidArgumentException($message);
        }

        throw $message;
    }

    /**
     * @throws \Exception
     */
    public function throwIfTrue($message): void
    {
        if ($this->isFalse()) {
            return;
        }

        if (is_string($message)) {
            throw new \InvalidArgumentException($message);
        }

        throw $message;
    }
}
