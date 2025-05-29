<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ToJsonInterface.
 */
interface ToJsonInterface
{
    /**
     * Returns the elements in JSON format.
     *
     * @api
     */
    public function toJson(int $options = 0): ?string;
}
