<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

trait DebugCollectionTrait
{
    /**
     * Prints the map content and terminates the script.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function dd()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Prints the map content.
     *
     * @api
     */
    public function dump(?callable $callback = null): self
    {
        $dump = $this->collection
            ->dump($callback)
        ;

        return self::of($dump);
    }

    /**
     * Passes a clone of the map to the given callback.
     *
     * @param callable $callback Function receiving ($map) parameter
     *
     * @api
     */
    public function tap(callable $callback): self
    {
        $tap = $this->collection
            ->tap($callback)
        ;

        return self::of($tap);
    }
}
