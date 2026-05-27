<?php

declare(strict_types=1);

namespace Atournayre\Contracts\DependencyInjection;

use Doctrine\ORM\Event\PostLoadEventArgs;

/**
 * Interface for handling PostLoad events in Doctrine.
 *
 * Implementations of this interface can handle PostLoad events
 * to perform operations after entities are loaded from the database.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface PostLoadHandlerInterface
{
    /**
     * Handles the PostLoad event.
     *
     * @param PostLoadEventArgs $args The event arguments
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __invoke(PostLoadEventArgs $args): void;
}
