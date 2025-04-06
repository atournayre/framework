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

    private function __construct(Ulid $ulid)
    {
        $this->ulid = $ulid;
    }

    public static function of(string $string): self
    {
        return new self(Ulid::of($string));
    }

    public function toString(): string
    {
        return $this->ulid->toString();
    }

    public function equalsTo(self $ulid): BoolEnum
    {
        return $this->ulid->equalsTo($ulid->ulid);
    }

    public function toRfc4122(): StringType
    {
        return $this->ulid->toRfc4122();
    }

    /**
     * @throws ThrowableInterface
     */
    public function getDateTime(): DateTimeInterface
    {
        try {
            return $this->ulid->getDateTime();
        } catch (\Exception $exception) {
            RuntimeException::fromThrowable($exception)->throw();
        }
    }
}
