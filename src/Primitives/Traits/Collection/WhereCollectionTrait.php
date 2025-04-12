<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\WhereCollectionInterface;

/**
 * Trait WhereCollectionTrait.
 *
 * @see WhereCollectionInterface
 */
trait WhereCollectionTrait
{
    /**
     * Filters the list of elements by a given condition.
     *
     * @param string $key   Key or path of the value in the array or object used for comparison
     * @param string $op    Operator used for comparison
     * @param mixed  $value Value used for comparison
     *
     * @api
     */
    public function where(string $key, string $op, $value): self
    {
        $where = $this->collection->where($key, $op, $value);

        return self::of($where);
    }
}
