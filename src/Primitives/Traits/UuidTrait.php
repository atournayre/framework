<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Uuid;

trait UuidTrait
{
    protected Uuid $uuid;

    private function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    public static function of(string $string): self
    {
        return new self(Uuid::of($string));
    }

    public static function v4(): self
    {
        return new self(Uuid::v4());
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }

    public function equalsTo(self $uuid): BoolEnum
    {
        return $this->uuid->equalsTo($uuid->uuid);
    }

    public function toRfc4122(): StringType
    {
        return $this->uuid->toRfc4122();
    }
}
