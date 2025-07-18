<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\TryCatch;

use Atournayre\Contracts\TryCatch\ExecutableTryCatchInterface;
use Atournayre\Tests\Fixtures\Exception\InvalidEmailException;
use Atournayre\Tests\Fixtures\User;
use Atournayre\TryCatch\TryCatch;
use Psr\Log\LoggerInterface;

/**
 * @implements ExecutableTryCatchInterface<User>
 */
final readonly class CreateUserUsingHandlersTryCatch implements ExecutableTryCatchInterface
{
    private function __construct(
        private string $email,
        private string $name,
        private LoggerInterface $logger,
    ) {
    }

    /**
     * @api
     */
    public static function new(
        string $email,
        string $name,
        LoggerInterface $logger,
    ): self {
        return new self(
            email: $email,
            name: $name,
            logger: $logger,
        );
    }

    /**
     * @throws \Throwable
     */
    public function execute(): User
    {
        return TryCatch::with(
            tryBlock: function () {
                return User::create($this->email, $this->name);
            },
            logger: $this->logger,
        )->catch(
            throwableClass: InvalidEmailException::class,
            handler: function (InvalidEmailException $exception) {
                // Log the exception or perform other actions
                // Return a default user
                return User::create('no@email.com', 'No Name');
            },
        )->execute();
    }
}
