<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\Collection\FloatCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

/**
 * Trait FloatCollectionTrait.
 *
 * @see FloatCollectionInterface
 */
trait FloatCollectionTrait
{
    /**
     * Returns an element by key and casts it to float.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to float)
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function float($key, $default = 0.0): Numeric
    {
        $float = $this->collection->float($key, $default);
        try {
            return Numeric::fromFloat($float);
        } catch (\Exception|ThrowableInterface $e) {
            throw InvalidArgumentException::fromThrowable($e);
        }
    }
}
