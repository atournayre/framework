<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Symfony\Component\Uid\Uuid as SymfonyUuid;

final readonly class Uuid
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private function __construct(
        private SymfonyUuid $uuid,
    ) {
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function of(string $string): Uuid
    {
        return new self(SymfonyUuid::fromString($string));
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function v4(): self
    {
        return new self(SymfonyUuid::v4());
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toString(): string
    {
        return $this->uuid->toRfc4122();
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function equalsTo(self $uuid): BoolEnum
    {
        $equalsTo = $this->uuid->equals($uuid->uuid);

        return BoolEnum::fromBool($equalsTo);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toRfc4122(): StringType
    {
        $rfc4122 = $this->uuid->toRfc4122();

        return StringType::of($rfc4122);
    }
}
