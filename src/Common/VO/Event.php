<?php

declare(strict_types=1);

namespace Atournayre\Common\VO;

use Atournayre\Common\Traits\ContextTrait;
use Atournayre\Contracts\Context\HasContextInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Psr\EventDispatcher\StoppableEventInterface;

class Event implements StoppableEventInterface, HasContextInterface, LoggableInterface
{
    use ContextTrait;

    public function _identifier(): string
    {
        return \spl_object_hash($this);
    }

    private bool $propagationStopped = false;

    /**
     * @api
     */
    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }

    /**
     * @api
     */
    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }

    public function _type(): string
    {
        return \get_class($this);
    }

    public function toLog(): array
    {
        return [
            'identifier' => $this->_identifier(),
            'type' => $this->_type(),
            'context' => $this->getContext()->toLog(),
        ];
    }
}
