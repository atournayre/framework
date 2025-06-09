# TryCatch

This library provides a fluent interface for implementing the try-catch-finally pattern in PHP with strong type inference support.

## Type Inference

The TryCatch library uses PHP's generic type system to provide better type inference and IDE autocompletion. When you use the `TryCatch::with()` or `TryCatch::new()` methods, the return type of your try block is automatically inferred and propagated to the result of the `execute()` method.

This means your IDE can provide proper autocompletion for the result of `execute()` based on what your try block returns.

```php
// The IDE knows that $result is a string
$result = TryCatch::with(fn () => "Hello world", $logger)->execute();
$result->length; // IDE shows error: string doesn't have a length property

// The IDE knows that $user is a User object
$user = TryCatch::with(fn () => User::create("email@example.com", "John"), $logger)->execute();
$user->getName(); // IDE provides autocompletion for User methods
```

## Basic Usage

```php
<?php

use Atournayre\TryCatch\TryCatch;
use Atournayre\TryCatch\ThrowableHandlerCollection;
use Psr\Log\LoggerInterface;

// Create a new TryCatch instance
// The return type of the try block (string) is inferred and propagated to $result
$result = TryCatch::with(
    tryBlock: function(): string {
        // Your code that might throw exceptions
        return 'Success';
    },
    logger: $logger
)
->catch(\RuntimeException::class, function(\RuntimeException $exception): string {
    // Handle RuntimeException
    return 'Handled RuntimeException';
})
->catch(\InvalidArgumentException::class, function(\InvalidArgumentException $exception): string {
    // Handle InvalidArgumentException
    return 'Handled InvalidArgumentException';
})
->finally(function() {
    // Code that will always run
})
->execute();

// The IDE knows that $result is a string and provides autocompletion
$uppercase = strtoupper($result); // IDE provides autocompletion for string functions
```

## TryCatch

The main class that implements the try-catch-finally pattern.

- `new<TReturn>(tryBlock: \Closure(): TReturn, handlers: ThrowableHandlerCollectionInterface, logger: LoggerInterface, [finallyBlock: \Closure|null = null]): self<TReturn>`
- `with<TReturn>(tryBlock: \Closure(): TReturn, logger: LoggerInterface): self<TReturn>`
- `catch(throwableClass: string, handler: \Closure): self<T>` - Preserves the generic type T
- `finally(finallyBlock: \Closure): self<T>` - Preserves the generic type T
- `execute(): T` - Returns the type specified by the generic parameter T

## ThrowableHandlerCollection

Collection of throwable handlers.

- `asList([collection: array = []]): self`
- `add(value: ThrowableHandlerInterface): self`
- `addWithCallback(value: mixed, callback: \Closure): self`
- `remove(keys: int|array|\Traversable): self`
- `findHandlerFor(throwable: \Throwable): ThrowableHandlerInterface<mixed>` - Returns a handler that can handle the throwable

## ThrowableHandler

Implementation for throwable handlers.

- `new(throwableClass: string, handlerFunction: \Closure): self` - Creates a new handler for the specified throwable class
- `canHandle(throwable: \Throwable): bool` - Checks if the handler can handle the given throwable
- `handle(throwable: \Throwable): T` - Handles the throwable and returns a value of type T

## ThrowableHandlerInterface

Interface for throwable handlers.

- `@template T` - Generic type parameter for the return type of the handler
- `canHandle(throwable: \Throwable): bool` - Checks if the handler can handle the given throwable
- `handle(throwable: \Throwable): T` - Handles the throwable and returns a value of type T

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
// The return type of the try block (string) is inferred and propagated to $result
$result = TryCatch::new(
    tryBlock: function(): string {
        // Your code that might throw exceptions
        return 'Success';
    },
    handlers: $handlers,
    logger: $logger,
    finallyBlock: function() {
        // Code that will always run
    }
)->execute();

// The IDE knows that $result is a string and provides autocompletion
$length = strlen($result); // IDE provides autocompletion for string functions
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

/**
 * @implements ExecutableTryCatchInterface<User|null>
 */
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
            tryBlock: function (): User {
                return User::create($this->email, $this->name);
            },
            logger: $this->logger,
        )->catch(
            throwableClass: InvalidEmailException::class,
            handler: function (InvalidEmailException $exception): ?User {
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
- Using the generic type parameter `<User|null>` to specify the return type
- Using TryCatch to handle a specific exception type (InvalidEmailException)
- Returning null when an exception occurs
- Using the fluent interface to create a clean, readable implementation
- Providing proper type information for IDE autocompletion
