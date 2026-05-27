<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Symfony\Component\Uid\Ulid as SymfonyUlid;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final readonly class Ulid
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(
        private SymfonyUlid $ulid,
    ) {
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function of(?string $string = null): Ulid
    {
        return new self(new SymfonyUlid($string));
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toString(): string
    {
        return $this->ulid->toBase32();
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function equalsTo(self $ulid): BoolEnum
    {
        $equalsTo = $this->ulid->equals($ulid->ulid);

        return BoolEnum::fromBool($equalsTo);
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dateTime(): DateTimeInterface
    {
        return DateTime::of($this->ulid->getDateTime());
    }
}
