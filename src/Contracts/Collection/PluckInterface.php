<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PluckInterface.
 */
interface PluckInterface
{
    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function pluck(?string $valuecol = null, ?string $indexcol = null): self;
}
