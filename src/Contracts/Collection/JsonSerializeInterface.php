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
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function jsonSerialize();
}
