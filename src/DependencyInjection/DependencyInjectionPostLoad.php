<?php

declare(strict_types=1);

namespace Atournayre\DependencyInjection;

use Atournayre\Contracts\DependencyInjection\DependencyInjectionAwareInterface;
use Atournayre\Contracts\DependencyInjection\PostLoadHandlerInterface;
use Doctrine\ORM\Event\PostLoadEventArgs;

/**
 * Doctrine PostLoad handler for dependency injection.
 *
 * This handler automatically injects dependencies into entities
 * that implement DependencyInjectionAwareInterface after they are loaded from the database.
 *
 * This handler uses setDependencyInjection() because Doctrine's PostLoad event works
 * with existing entity instances that cannot be replaced with new instances.
 * The immutable withDependencyInjection() method is not suitable for this use case
 * as it returns a new instance.
 */
final readonly class DependencyInjectionPostLoad implements PostLoadHandlerInterface
{
    public function __construct(
        private EntityDependencyInjection $entityDependencyInjection,
    ) {
    }

    /**
     * Handles the PostLoad event.
     *
     * @param PostLoadEventArgs $args The event arguments
     */
    public function __invoke(PostLoadEventArgs $args): void
    {
        $entity = $args->getObject();

        // Guard: check if entity implements DependencyInjectionAwareInterface
        if (!$entity instanceof DependencyInjectionAwareInterface) {
            return;
        }

        // Inject dependencies into the entity
        $entity->setDependencyInjection($this->entityDependencyInjection);
    }
}
