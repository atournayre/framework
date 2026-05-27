<?php

declare(strict_types=1);

namespace Atournayre\Common\Traits;

use Atournayre\Contracts\Context\ContextInterface;

trait ContextTrait
{
    private ContextInterface $context;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function context(): ContextInterface
    {
        return $this->context;
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withContext(ContextInterface $context): self
    {
        $new = clone $this;
        $new->context = $context;

        return $new;
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function hasContext(): bool
    {
        if (!isset($this->context)) {
            return false;
        }

        return $this->context->isNotNull();
    }
}
