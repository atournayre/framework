<?php

declare(strict_types=1);

namespace Atournayre\Contracts\CommandBus;

/**
 * Interface for query bus implementations.
 *
 * The query bus is responsible for dispatching queries to their appropriate handlers.
 * Queries are typically used for read operations and data retrieval.
 */
interface QueryBusInterface
{
    /**
     * Asks a query and returns the result.
     *
     * @param QueryInterface $query The query to ask
     *
     * @return mixed The result of the query
     */
    public function ask(QueryInterface $query): mixed;
}
