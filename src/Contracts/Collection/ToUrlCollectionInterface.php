<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ToUrlCollectionInterface.
 */
interface ToUrlCollectionInterface
{
    /**
     * Creates a HTTP query string.
     *
     * @api
     */
    public function toUrl(): string;
}
