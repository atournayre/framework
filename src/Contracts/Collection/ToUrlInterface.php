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
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toUrl(): string;
}
