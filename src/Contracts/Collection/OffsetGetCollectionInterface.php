<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface OffsetGetCollectionInterface.
 */
interface OffsetGetCollectionInterface
{
    /**
     * Returns an element by key.
     *
     * @param array-key $offset
     *
     * @return mixed|null
     *
     * @api
     */
    public function offsetGet($offset);
}
