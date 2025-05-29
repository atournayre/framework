<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ToUrlInterface.
 */
interface ToUrlInterface
{
    /**
     * Creates a HTTP query string.
     *
     * @api
     */
    public function toUrl(): string;
}
