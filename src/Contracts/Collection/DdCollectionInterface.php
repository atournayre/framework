<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface DdCollectionInterface.
 */
interface DdCollectionInterface
{
    /**
     * Prints the map content and terminates the script.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function dd();
}
