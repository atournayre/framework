# TryCatch

This library provides a fluent interface for implementing the try-catch-finally pattern in PHP with strong type inference support.

## Type Inference

The TryCatch library uses PHP's generic type system to provide better type inference and IDE autocompletion. When you use the `TryCatch::with()` method, the return type of your try block is automatically inferred and propagated to the result of the `execute()` method.

This means your IDE can provide proper autocompletion for the result of `execute()` based on what your try block returns.

```php
<?php

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
    // If this block returns a non-null value, it will be used as the result of execute()
    return 'Value from finally block'; // Optional: override the result
})
->execute();

// The IDE knows that $result is a string and provides autocompletion
$uppercase = strtoupper($result); // IDE provides autocompletion for string functions
```

## TryCatch

The main class that implements the try-catch-finally pattern.

- `with<TReturn>(tryBlock: \Closure(): TReturn, logger: LoggerInterface): self<TReturn>`
- `catch(throwableClass: string, handler: \Closure): self<T>` - Preserves the generic type T
- `finally(finallyBlock: \Closure): self<T>` - Preserves the generic type T. If the finally block returns a non-null value, it will be used as the result of execute()
- `reThrow(throwableClass: string, message: string = '', code: int = 0): self<T>` - Logs and rethrows the caught exception wrapped in a ThrowableInterface
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

### Using Multiple Exception Handlers

```php
<?php

use Atournayre\TryCatch\TryCatch;
use Psr\Log\LoggerInterface;

// Create a TryCatch instance with multiple catch handlers
// The return type of the try block (string) is inferred and propagated to $result
$result = TryCatch::with(
    tryBlock: function(): string {
        // Your code that might throw exceptions
        return 'Success';
    },
    logger: $logger
)
->catch(\RuntimeException::class, function(\RuntimeException $exception): string {
    return 'Handled RuntimeException';
})
->catch(\InvalidArgumentException::class, function(\InvalidArgumentException $exception): string {
    return 'Handled InvalidArgumentException';
})
->finally(function() {
    // Code that will always run
    // If this block returns a non-null value, it will be used as the result of execute()
    return 'Value from finally block'; // Optional: override the result
})
->execute();

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

### Void Try Block with Catch Returning a Value

In some cases, you might have a try block that doesn't return anything (void), but you want the catch handler to return a value when an exception occurs. The TryCatch class handles this case automatically:

```php
<?php

use Atournayre\TryCatch\TryCatch;
use Psr\Log\LoggerInterface;

// The try block performs an action but doesn't return anything
$result = TryCatch::with(
    tryBlock: function(): void {
        // Your code that might throw exceptions but doesn't return anything
        performSomeAction();
    },
    logger: $logger
)
->catch(\RuntimeException::class, function(\RuntimeException $exception): string {
    // When an exception occurs, the catch handler can return a value
    return 'Error occurred: ' . $exception->getMessage();
})
->execute();

// If an exception was caught, $result will contain the value returned by the catch handler
// If no exception was caught, $result will be null
```

This is useful for scenarios where a process doesn't normally return anything, but you want to return information about errors when they occur.

### Using reThrow to Wrap Exceptions

The `reThrow()` method allows you to catch any exception thrown in the try block, log it, and then rethrow it wrapped in a new exception of a specified class. This is useful for converting low-level exceptions into domain-specific exceptions while preserving the original exception information.

```php
<?php

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\TryCatch\TryCatch;
use Psr\Log\LoggerInterface;

try {
    // The try block might throw various exceptions
    $result = TryCatch::with(
        tryBlock: function() {
            // Code that might throw exceptions
            return callExternalService();
        },
        logger: $logger
    )
    ->reThrow(
        // Specify the exception class to use for wrapping
        // This class must implement ThrowableInterface
        throwableClass: RuntimeException::class,
        // Optional: Provide a custom message (if empty, the original message will be used)
        message: 'An error occurred while calling the external service',
        // Optional: Provide a custom code (if 0, the original code will be used)
        code: 500
    )
    ->execute();
} catch (RuntimeException $exception) {
    // Handle the wrapped exception
    // The original exception is available as $exception->getPrevious()
    $originalException = $exception->getPrevious();

    // Log or handle the exception as needed
    echo "Error: " . $exception->getMessage();
    echo "Original error: " . $originalException->getMessage();
}
```

Key points about `reThrow()`:
- It logs the original exception before rethrowing
- It wraps the original exception in a new exception of the specified class
- The original exception is preserved as the "previous" exception
- If no message is provided (or an empty string), the original exception's message is used
- If no code is provided (or 0), the original exception's code is used
- The specified throwable class must implement ThrowableInterface
