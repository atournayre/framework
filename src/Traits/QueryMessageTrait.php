<?php

declare(strict_types=1);

namespace Atournayre\Traits;

use Atournayre\Contracts\CommandBus\QueryBusInterface;

/**
 * Trait for query message functionality.
 *
 * This trait provides a query() method that can be used by classes
 * implementing QueryInterface to ask themselves through a query bus.
 */
trait QueryMessageTrait
{
    /**
     * Asks this query through the provided query bus and returns the result.
     *
     * @param QueryBusInterface $bus The query bus to use for asking
     *
     * @return mixed The result of the query
     */
    public function query(QueryBusInterface $bus): mixed
    {
        return $bus->ask($this);
    }
}
