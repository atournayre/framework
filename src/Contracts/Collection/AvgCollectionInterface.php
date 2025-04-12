<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\Numeric;

/**
 * Interface AvgCollectionInterface.
 */
interface AvgCollectionInterface
{
    /**
     * Returns the average of all values.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function avg(?string $key = null): Numeric;
}
