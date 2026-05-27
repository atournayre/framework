<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface GetIteratorInterface.
 */
interface GetIteratorInterface
{
    /**
     * Returns an iterator for the elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getIterator();
}
