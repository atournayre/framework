<?php

declare(strict_types=1);

namespace Atournayre\Common\Traits;

use Atournayre\Contracts\Context\ContextInterface;

trait ContextTrait
{
    private ContextInterface $context;

    /**
     * @throws \Exception
     */
    public function getContext(): ContextInterface
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
        return $this->context->isNotNull();
    }
}
