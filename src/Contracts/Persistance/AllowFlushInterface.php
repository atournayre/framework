<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Persistance;

/**
 * Interface to mark classes that allow automatic transaction management.
 *
 * Classes implementing this interface will have transactions automatically
 * started, committed, and rolled back:
 * - Controllers via DoctrineTransactionSubscriber
 * - Console commands via DoctrineCommandTransactionSubscriber
 * - Messenger handlers via DoctrineTransactionMiddleware
 */
interface AllowFlushInterface
{
}
