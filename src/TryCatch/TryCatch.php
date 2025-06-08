<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\TryCatch\Contracts\ExecutableTryCatchInterface;
use Atournayre\TryCatch\Contracts\ThrowableHandlerCollectionInterface;
use Psr\Log\LoggerInterface;

/**
 * Class TryCatch.
 *
 * Main implementation of the try-catch-finally pattern.
 */
final class TryCatch implements ExecutableTryCatchInterface
{
    /**
     * @var \Closure|null The finally block
     */
    private ?\Closure $finallyBlock;

    public function __construct(
        private readonly \Closure                            $tryBlock,
        private readonly ThrowableHandlerCollectionInterface $handlers,
        private readonly LoggerInterface                     $logger,
        ?\Closure                                            $finallyBlock = null,
    )
    {
        $this->finallyBlock = $finallyBlock;
    }

    /**
     * {@inheritdoc}
     * @throws \Throwable
     */
    public function execute(): mixed
    {
        $result = null;

        try {
            $result = ($this->tryBlock)();
        } catch (\Throwable $throwable) {
            $this->logger->error('Exception caught in TryCatch: ' . $throwable->getMessage(), [
                'exception' => $throwable,
            ]);

            $handler = $this->handlers->findHandlerFor($throwable);

            if ($handler !== null) {
                $result = $handler->handle($throwable);
            } else {
                // If no handler is found, rethrow the exception
                throw $throwable;
            }
        } finally {
            if ($this->finallyBlock !== null) {
                ($this->finallyBlock)();
            }
        }

        return $result;
    }
}
