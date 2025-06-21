# Exceptions

This guide provides documentation for working with exceptions in the Framework.

## Overview

The Framework provides a robust exception handling system based on the `ThrowableInterface`. This interface extends PHP's native `\Throwable` interface and adds additional methods for creating, manipulating, and logging exceptions in a fluent way.

All exception classes in the Framework implement this interface, providing a consistent API for working with exceptions.

## ThrowableInterface

The `ThrowableInterface` is the foundation of the Framework's exception system:

```php
<?php

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggerInterface;

/**
 * Interface for throwable objects in the framework.
 * 
 * This interface extends PHP's native \Throwable interface and provides
 * additional methods for creating and manipulating exceptions in a fluent way.
 */
interface ThrowableInterface extends \Throwable
{
    /**
     * Creates a new instance of the throwable.
     *
     * @param string $message The exception message
     * @param int $code The exception code
     * 
     * @return self The new throwable instance
     */
    public static function new(string $message = '', int $code = 0): self;

    /**
     * Creates a new instance from an existing throwable.
     *
     * @param \Throwable $throwable The original throwable to convert
     * 
     * @return self The new throwable instance
     */
    public static function fromThrowable(\Throwable $throwable): self;

    /**
     * Sets the previous throwable.
     *
     * @param \Throwable $previous The previous throwable
     * 
     * @return self A new instance with the previous throwable set
     */
    public function withPrevious(\Throwable $previous): self;

    /**
     * Throws this throwable.
     * 
     * If a logger is provided, logs the exception before throwing it.
     *
     * @param LoggerInterface|null $logger  The logger to use for logging the exception
     * @param array                $context Additional context information for logging
     * 
     * @throws ThrowableInterface Always throws this throwable
     */
    public function throw(?LoggerInterface $logger = null, array $context = []): void;
}
```

## Exception Classes

The Framework provides several exception classes that implement `ThrowableInterface`:

- `BadMethodCallException`: For when a method is called on an object that doesn't support it
- `InvalidArgumentException`: For when an argument provided to a method is not valid
- `MutableException`: For when an immutable object is attempted to be modified
- `NullException`: A general-purpose exception for null-related errors
- `RuntimeException`: For exceptions that occur during runtime
- `UnexpectedValueException`: For when a value doesn't match what was expected

All these classes extend PHP's built-in exception classes and implement the `ThrowableInterface`.

## Creating Exceptions

You can create exceptions in several ways:

```php
<?php

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Common\Exception\RuntimeException;

// Create a new exception with a message
$exception = InvalidArgumentException::new('Invalid email address');

// Create a new exception with a message and code
$exception = RuntimeException::new('An error occurred', 500);

// Create an exception from another throwable
$originalException = new \Exception('Original error', 400);
$exception = InvalidArgumentException::fromThrowable($originalException);

// Create an exception with a previous exception
$previousException = new \Exception('Previous error');
$exception = RuntimeException::new('Current error')
    ->withPrevious($previousException);
```

## Throwing Exceptions

The `throw()` method provides a fluent way to throw exceptions, with optional logging:

```php
<?php

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Common\Log\DefaultLogger;

// Create a logger
$logger = new DefaultLogger();

// Create and throw an exception in one line
InvalidArgumentException::new('Invalid argument')->throw();

// Create, log, and throw an exception in one line
InvalidArgumentException::new('Invalid argument')->throw($logger);

// Create, log with context, and throw an exception in one line
InvalidArgumentException::new('Invalid argument')->throw($logger, [
    'user_id' => 123,
    'action' => 'user_registration',
]);

// The above is equivalent to:
throw new InvalidArgumentException('Invalid argument');
```

## Logging Exceptions When Throwing

The `throw()` method allows you to log exceptions when throwing them by providing a logger that implements the `LoggerInterface`:

```php
<?php

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Common\Log\DefaultLogger;

// Create a logger
$logger = new DefaultLogger();

// Create an exception
$exception = RuntimeException::new('An error occurred');

// Log and throw the exception in one step
$exception->throw($logger);

// Log with additional context and throw
$exception->throw($logger, [
    'user_id' => 123,
    'action' => 'user_registration',
]);
```

When a logger is provided to the `throw()` method, it internally calls the logger's `exception()` method before throwing the exception, which typically logs the exception message, stack trace, and any additional context provided.

## Using Exceptions with TryCatch

The Framework provides a `TryCatch` utility that makes it easier to work with exceptions:

```php
<?php

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\TryCatch\TryCatch;
use Atournayre\Common\Log\DefaultLogger;

// Create a logger
$logger = new DefaultLogger();

// Use TryCatch to handle exceptions
$result = TryCatch::with(
    tryBlock: function() {
        // Code that might throw exceptions
        if (someCondition()) {
            throw RuntimeException::new('An error occurred');
        }
        return 'Success';
    },
    logger: $logger
)
->catch(RuntimeException::class, function(RuntimeException $exception) {
    // The exception is automatically logged by TryCatch
    // You can perform additional handling here
    return 'Error: ' . $exception->getMessage();
})
->execute();
```

When using `TryCatch`, exceptions are automatically logged using the provided logger, so you don't need to call the `log()` method explicitly.

## Best Practices

Here are some best practices for working with exceptions in the Framework:

1. **Use the appropriate exception class**: Choose the exception class that best describes the error condition.

2. **Provide meaningful error messages**: Error messages should be clear and descriptive, helping developers understand what went wrong.

3. **Include context in logs**: When logging exceptions, include relevant context information that can help with debugging.

4. **Use the fluent interface**: Take advantage of the fluent interface provided by `ThrowableInterface` to create, configure, and throw exceptions in a concise way.

5. **Catch specific exceptions**: When catching exceptions, catch the most specific exception class possible rather than catching all exceptions.

6. **Use TryCatch for complex exception handling**: For complex exception handling scenarios, use the `TryCatch` utility to simplify your code.

## Creating Custom Exceptions

You can create your own custom exception classes by extending one of the Framework's exception classes and implementing `ThrowableInterface`:

```php
<?php

namespace YourNamespace\Exception;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Exception thrown when an email address is invalid.
 */
final class InvalidEmailException extends InvalidArgumentException implements ThrowableInterface
{
    public static function new(string $message = '', int $code = 0): self
    {
        return new self('' !== $message ? $message : 'Invalid email address', $code);
    }
}
```

You can then use your custom exception class just like the built-in exception classes:

```php
<?php

use YourNamespace\Exception\InvalidEmailException;
use Atournayre\Common\Log\DefaultLogger;

// Create a logger
$logger = new DefaultLogger();

// Create and throw a custom exception
InvalidEmailException::new()->throw();

// Or with a custom message
InvalidEmailException::new('The email address "example" is not valid')->throw();

// Log and throw in one line
InvalidEmailException::new('The email address "example" is not valid')
    ->throw($logger);

// Log with context and throw in one line
InvalidEmailException::new('The email address "example" is not valid')
    ->throw($logger, ['email' => 'example']);
```
