<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use function Symfony\Component\String\u;

final class BoolEnum
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

    /**
     * @api
     */
    public function asString(): string
    {
        return u($this->value)->lower()->toString();
    }

    /**
     * @api
     */
    public function asInt(): int
    {
        return $this->value === self::TRUE ? 1 : 0;
    }

    /**
     * @api
     */
    public function asBool(): bool
    {
        return $this->value === self::TRUE;
    }

    /**
     * @api
     */
    public function isTrue(): bool
    {
        return $this->value === self::TRUE;
    }

    /**
     * @api
     */
    public function isFalse(): bool
    {
        return $this->value === self::FALSE;
    }

    /**
     * @api
     */
    public function yes(): bool
    {
        return $this->isTrue();
    }

    /**
     * @api
     */
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
     * @api
     * @param string|\Exception $message
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
     * @api
     * @param string|\Exception $message
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
