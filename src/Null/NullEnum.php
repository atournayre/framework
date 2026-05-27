<?php

declare(strict_types=1);

namespace Atournayre\Null;

final readonly class NullEnum
{
    private const YES = 'yes';

    private const NO = 'no';

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private function __construct(
        private string $value,
    ) {
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isNull(): bool
    {
        return self::YES === $this->value;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isNotNull(): bool
    {
        return self::NO === $this->value;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function fromBool(bool $bool): self
    {
        return $bool ? new self(self::YES) : new self(self::NO);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function yes(): self
    {
        return new self(self::YES);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function no(): self
    {
        return new self(self::NO);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function value(): string
    {
        return $this->value;
    }
}
