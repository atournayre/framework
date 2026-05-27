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
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(
        private SymfonyUlid $ulid,
    ) {
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function of(?string $string = null): Ulid
    {
        return new self(new SymfonyUlid($string));
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toString(): string
    {
        return $this->ulid->toBase32();
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function equalsTo(self $ulid): BoolEnum
    {
        $equalsTo = $this->ulid->equals($ulid->ulid);

        return BoolEnum::fromBool($equalsTo);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
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
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dateTime(): DateTimeInterface
    {
        return DateTime::of($this->ulid->getDateTime());
    }
}
