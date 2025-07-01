<?php

declare(strict_types=1);

namespace Atournayre\Common;

use Atournayre\Contracts\CommandBus\QueryInterface;
use Atournayre\Traits\QueryMessageTrait;

/**
 * Abstract base class for query events.
 *
 * This class provides a fluent interface for query creation and dispatching.
 * Instead of using $queryBus->ask(new MyQuery()), you can now use
 * MyQuery::new()->dispatch($queryBus).
 */
abstract class AbstractQueryEvent implements QueryInterface
{
    use QueryMessageTrait;
}
