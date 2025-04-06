<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Symfony\Component\Uid\Ulid as SymfonyUlid;

final readonly class Ulid
{
    private function __construct(
        private SymfonyUlid $ulid,
    )
    {
    }

    /**
     * @api
     */
    public static function of(?string $string = null): Ulid
    {
        return new self(new SymfonyUlid($string));
    }

    /**
     * @api
     */
    public function toString(): string
    {
        return $this->ulid->toBase32();
    }

    /**
     * @api
     */
    public function equalsTo(self $ulid): BoolEnum
    {
        $equalsTo = $this->ulid->equals($ulid->ulid);

        return BoolEnum::fromBool($equalsTo);
    }

    /**
     * @api
     */
    public function toRfc4122(): StringType
    {
        $rfc4122 = $this->ulid->toRfc4122();

        return StringType::of($rfc4122);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function getDateTime(): DateTimeInterface
    {
        return DateTime::of($this->ulid->getDateTime());
    }
}
