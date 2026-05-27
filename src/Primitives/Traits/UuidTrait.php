<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Uuid;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait UuidTrait
{
    protected Uuid $uuid;

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function of(string $string): self
    {
        return new self(Uuid::of($string));
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function v4(): self
    {
        return new self(Uuid::v4());
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toString(): string
    {
        return $this->uuid->toString();
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function equalsTo(self $uuid): BoolEnum
    {
        return $this->uuid->equalsTo($uuid->uuid);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toRfc4122(): StringType
    {
        return $this->uuid->toRfc4122();
    }
}
