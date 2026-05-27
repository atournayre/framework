<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SearchInterface.
 */
interface SearchInterface
{
    /**
     * Find the key of an element.
     *
     * @param mixed|null $value
     *
     * @return int|string|null Key associated to the value or null if not found
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function search($value, bool $strict = true);
}
