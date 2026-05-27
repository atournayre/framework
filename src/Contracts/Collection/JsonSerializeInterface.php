<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface JsonSerializeInterface.
 */
interface JsonSerializeInterface
{
    /**
     * Specifies the data which should be serialized to JSON.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function jsonSerialize();
}
