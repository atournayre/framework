<?php

declare(strict_types=1);

namespace Atournayre\Null;

final readonly class NullEnum
{
    private const YES = 'yes';

    private const NO = 'no';

    private function __construct(
        private string $value,
    ) {
    }

    /**
     * @api
     */
    public function isNull(): bool
    {
        return self::YES === $this->value;
    }

    /**
     * @api
     */
    public function isNotNull(): bool
    {
        return self::NO === $this->value;
    }

    /**
     * @api
     */
    public static function fromBool(bool $bool): self
    {
        return $bool ? new self(self::YES) : new self(self::NO);
    }

    /**
     * @api
     */
    public static function yes(): self
    {
        return new self(self::YES);
    }

    /**
     * @api
     */
    public static function no(): self
    {
        return new self(self::NO);
    }

    /**
     * @api
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
