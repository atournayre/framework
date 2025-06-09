# TryCatch

This library provides a fluent interface for implementing the try-catch-finally pattern in PHP.

## Basic Usage

```php
<?php

use Atournayre\TryCatch\TryCatch;
use Atournayre\TryCatch\ThrowableHandlerCollection;
use Psr\Log\LoggerInterface;

// Create a new TryCatch instance
$result = TryCatch::with(
    tryBlock: function() {
        // Your code that might throw exceptions
        return 'Success';
    },
    logger: $logger
)
->catch(\RuntimeException::class, function(\RuntimeException $exception) {
    // Handle RuntimeException
    return 'Handled RuntimeException';
})
->catch(\InvalidArgumentException::class, function(\InvalidArgumentException $exception) {
    // Handle InvalidArgumentException
    return 'Handled InvalidArgumentException';
})
->finally(function() {
    // Code that will always run
})
->execute();
```

## TryCatch

The main class that implements the try-catch-finally pattern.

- `new(tryBlock: \Closure, handlers: ThrowableHandlerCollectionInterface, logger: LoggerInterface, [finallyBlock: \Closure|null = null]): self`
- `with(tryBlock: \Closure, logger: LoggerInterface): self`
- `catch(throwableClass: string, handler: \Closure): self`
- `finally(finallyBlock: \Closure): self`
- `execute(): mixed`

## ThrowableHandlerCollection

Collection of throwable handlers.

- `asList([collection: array = []]): self`
- `add(value: ThrowableHandlerInterface): self`
- `addWithCallback(value: mixed, callback: \Closure): self`
- `remove(keys: int|array|\Traversable): self`
- `findHandlerFor(throwable: \Throwable): ?ThrowableHandlerInterface`
- `hasHandlerFor(throwable: \Throwable): bool`

## ThrowableHandler

Implementation for throwable handlers.

- `new(throwableClass: string, handlerFunction: \Closure): self`
- `canHandle(throwable: \Throwable): bool`
- `handle(throwable: \Throwable): mixed`

## Advanced Usage

### Using with Custom Exception Handlers

```php
<?php

use Atournayre\TryCatch\TryCatch;
use Atournayre\TryCatch\ThrowableHandlerCollection;
use Atournayre\TryCatch\ThrowableHandler;
use Psr\Log\LoggerInterface;

// Create a collection of handlers
$handlers = ThrowableHandlerCollection::asList()
    ->add(ThrowableHandler::new(\RuntimeException::class, function(\RuntimeException $exception) {
        return 'Handled RuntimeException';
    }))
    ->add(ThrowableHandler::new(\InvalidArgumentException::class, function(\InvalidArgumentException $exception) {
        return 'Handled InvalidArgumentException';
    }));

// Create a TryCatch instance with the handlers
$result = TryCatch::new(
    tryBlock: function() {
        // Your code that might throw exceptions
        return 'Success';
    },
    handlers: $handlers,
    logger: $logger,
    finallyBlock: function() {
        // Code that will always run
    }
)->execute();
```

### Real-world Example: User Creation

This example demonstrates how to use TryCatch in a real application context to handle user creation with proper exception handling:

```php
<?php

use Atournayre\Tests\Fixtures\Exception\InvalidEmailException;
use Atournayre\Tests\Fixtures\User;
use Atournayre\Contracts\TryCatch\ExecutableTryCatchInterface;
use Atournayre\TryCatch\TryCatch;
use Psr\Log\LoggerInterface;

final readonly class CreateUserTryCatch implements ExecutableTryCatchInterface
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
        return TryCatch::with(
            tryBlock: function () {
                return User::create($this->email, $this->name);
            },
            logger: $this->logger,
        )->catch(
            throwableClass: InvalidEmailException::class,
            handler: function (InvalidEmailException $exception) {
                // Log the exception or perform other actions
                // Return a default user or null
                return null;
            },
        )->execute();
    }
}
```

This example shows:
- Creating a dedicated class that implements `ExecutableTryCatchInterface`
- Using TryCatch to handle a specific exception type (InvalidEmailException)
- Returning null when an exception occurs
- Using the fluent interface to create a clean, readable implementation
