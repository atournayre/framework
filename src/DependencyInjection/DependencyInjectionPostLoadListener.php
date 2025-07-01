<?php

declare(strict_types=1);

namespace Atournayre\DependencyInjection;

use Atournayre\Contracts\DependencyInjection\DependencyInjectionAwareInterface;
use Doctrine\ORM\Event\PostLoadEventArgs;

/**
 * Doctrine PostLoad listener for dependency injection.
 *
 * This listener automatically injects dependencies into entities
 * that implement DependencyInjectionAwareInterface after they are loaded from the database.
 */
final readonly class DependencyInjectionPostLoadListener
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
