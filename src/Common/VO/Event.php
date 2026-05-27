<?php

declare(strict_types=1);

namespace Atournayre\Common\VO;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Common\Traits\ContextTrait;
use Atournayre\Contracts\Context\HasContextInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Psr\EventDispatcher\StoppableEventInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
class Event implements StoppableEventInterface, HasContextInterface, LoggableInterface
{
    use ContextTrait;

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function _identifier(): string
    {
        return \spl_object_hash($this);
    }

    private bool $propagationStopped = false;

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function _type(): string
    {
        return static::class;
    }

    /**
     * @return array<string, mixed>
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toLog(): array
    {
        $log = [
            'identifier' => $this->_identifier(),
            'type' => $this->_type(),
        ];

        if (!$this->hasContext()) {
            return $log;
        }

        return $log + [
            'context' => $this->context()->toLog(),
        ];
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dispatch(MessageBusInterface $messageBus): void
    {
        try {
            $messageBus->dispatch($this);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }
}
