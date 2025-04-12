<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface IfEmptyCollectionInterface.
 */
interface IfEmptyCollectionInterface
{
    /**
     * Executes callbacks if the map is empty.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function ifEmpty();
}
