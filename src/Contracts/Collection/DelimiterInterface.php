<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface DelimiterInterface.
 */
interface DelimiterInterface
{
    /**
     * Sets or returns the seperator for paths to multi-dimensional arrays.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function delimiter();
}
