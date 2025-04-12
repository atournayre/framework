<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ColCollectionInterface.
 */
interface ColCollectionInterface
{
    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function col(?string $valuecol = null, ?string $indexcol = null): self;
}
