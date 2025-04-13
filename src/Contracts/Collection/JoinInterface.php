<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface JoinInterface.
 */
interface JoinInterface
{
    /**
     * Returns concatenated elements as string with separator.
     *
     * @api
     */
    public function join(string $glue = ''): string;
}
