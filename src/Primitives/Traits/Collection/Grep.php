<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\GrepInterface;

/**
 * Trait Grep.
 *
 * @see GrepInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Grep
{
    /**
     * Applies a regular expression to all elements.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function grep(string $pattern, int $flags = 0): self
    {
        $grep = $this->collection->grep($pattern, $flags);

        return self::of($grep);
    }
}
