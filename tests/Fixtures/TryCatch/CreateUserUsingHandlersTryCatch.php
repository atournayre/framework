<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\TryCatch;

use Atournayre\Tests\Fixtures\Exception\InvalidEmailException;
use Atournayre\Tests\Fixtures\User;
use Atournayre\Contracts\TryCatch\ExecutableTryCatchInterface;
use Atournayre\TryCatch\ThrowableHandler;
use Atournayre\TryCatch\ThrowableHandlerCollection;
use Atournayre\TryCatch\TryCatch;
use Psr\Log\LoggerInterface;

final readonly class CreateUserUsingHandlersTryCatch implements ExecutableTryCatchInterface
{
    private function __construct(
        private string          $email,
        private string          $name,
        private LoggerInterface $logger,
    )
    {
    }

    public static function new(
        string          $email,
        string          $name,
        LoggerInterface $logger,
    ): self
    {
        return new self(
            email: $email,
            name: $name,
            logger: $logger,
        );
    }

    /**
     * {@inheritdoc}
     * @throws \Throwable
     */
    public function execute(): ?User
    {
        $handlers = ThrowableHandlerCollection::new()
            ->add(
                ThrowableHandler::new(
                    throwableClass: InvalidEmailException::class,
                    handlerFunction: function (InvalidEmailException $exception) {
                        // Log the exception or perform other actions
                        // Return a default user or null
                        return null;
                    },
                ),
            );

        return TryCatch::new(
            tryBlock: function () {
                return User::create($this->email, $this->name);
            },
            handlers: $handlers,
            logger: $this->logger,
        )->execute();
    }
}
