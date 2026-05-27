<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Ulid;

trait UlidTrait
{
    protected Ulid $ulid;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private function __construct(Ulid $ulid)
    {
        $this->ulid = $ulid;
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function of(string $string): self
    {
        return new self(Ulid::of($string));
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toString(): string
    {
        return $this->ulid->toString();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function equalsTo(self $ulid): BoolEnum
    {
        return $this->ulid->equalsTo($ulid->ulid);
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toRfc4122(): StringType
    {
        return $this->ulid->toRfc4122();
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getDateTime(): DateTimeInterface
    {
        try {
            return $this->ulid->getDateTime();
        } catch (\Exception $exception) {
            RuntimeException::fromThrowable($exception)->throw();
        }
    }
}
