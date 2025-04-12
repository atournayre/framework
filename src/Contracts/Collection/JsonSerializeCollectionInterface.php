<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface JsonSerializeCollectionInterface.
 */
interface JsonSerializeCollectionInterface
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
