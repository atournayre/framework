<?php

declare(strict_types=1);

namespace Atournayre\Common\Traits;

use Atournayre\Contracts\Context\ContextInterface;

trait ContextTrait
{
    private ContextInterface $context;

    public function context(): ContextInterface
    {
        return $this->context;
    }

    public function withContext(ContextInterface $context): self
    {
        $new = clone $this;
        $new->context = $context;

        return $new;
    }

    public function hasContext(): bool
    {
        if (!isset($this->context)) {
            return false;
        }

        return $this->context->isNotNull();
    }
}
