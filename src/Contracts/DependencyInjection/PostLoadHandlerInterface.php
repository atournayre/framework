<?php

declare(strict_types=1);

namespace Atournayre\Contracts\DependencyInjection;

use Doctrine\ORM\Event\PostLoadEventArgs;

/**
 * Interface for handling PostLoad events in Doctrine.
 *
 * Implementations of this interface can handle PostLoad events
 * to perform operations after entities are loaded from the database.
 */
interface PostLoadHandlerInterface
{
    /**
     * Handles the PostLoad event.
     *
     * @param PostLoadEventArgs $args The event arguments
     */
    public function __invoke(PostLoadEventArgs $args): void;
}
