# Interfaces

This guide provides documentation for all interfaces in the Framework's Contracts directory.

## Collection Interfaces

The Framework provides several interfaces for working with collections:

### CollectionValidationInterface

The `CollectionValidationInterface` provides methods for validating collections:

```php
<?php

use Atournayre\Contracts\Collection\CollectionValidationInterface;

// Interface methods
public function validate(): void;
```

### ListInterface

The `ListInterface` provides methods for working with list collections:

```php
<?php

use Atournayre\Contracts\Collection\ListInterface;

// Interface methods
public static function asList(array $collection);
```

### MapInterface

The `MapInterface` provides methods for working with map collections:

```php
<?php

use Atournayre\Contracts\Collection\MapInterface;

// Interface methods
/**
 * @param array<string, mixed> $collection
 * @return static
 * @throws ThrowableInterface
 */
public static function asMap(array $collection);
```

### NumericListInterface

The `NumericListInterface` provides methods for working with numeric list collections:

```php
<?php

use Atournayre\Contracts\Collection\NumericListInterface;

// Interface methods
// (Methods specific to numeric lists)
```

### NumericMapInterface

The `NumericMapInterface` provides methods for working with numeric map collections:

```php
<?php

use Atournayre\Contracts\Collection\NumericMapInterface;

// Interface methods
// (Methods specific to numeric maps)
```

### ReadOnlyListInterface

The `ReadOnlyListInterface` provides methods for working with read-only list collections:

```php
<?php

use Atournayre\Contracts\Collection\ReadOnlyListInterface;

// Interface methods
// (Methods specific to read-only lists)
```

### ReadOnlyMapInterface

The `ReadOnlyMapInterface` provides methods for working with read-only map collections:

```php
<?php

use Atournayre\Contracts\Collection\ReadOnlyMapInterface;

// Interface methods
// (Methods specific to read-only maps)
```

## Common Interfaces

The Framework provides several common interfaces:

### Assert Interfaces

The Framework provides several interfaces for making assertions:

```php
<?php

use Atournayre\Contracts\Common\Assert\AssertInterface;
use Atournayre\Contracts\Common\Assert\AssertStringInterface;
use Atournayre\Contracts\Common\Assert\AssertNumericInterface;
use Atournayre\Contracts\Common\Assert\AssertMiscInterface;
use Atournayre\Contracts\Common\Assert\AssertAllInterface;
use Atournayre\Contracts\Common\Assert\AssertIsInterface;
use Atournayre\Contracts\Common\Assert\AssertNotInterface;
use Atournayre\Contracts\Common\Assert\AssertNullInterface;

// Interface methods
// (Methods for making assertions)
```

### Context Interfaces

The Framework provides interfaces for working with contexts:

```php
<?php

use Atournayre\Contracts\Context\ContextInterface;

// Interface methods
public function user(): UserInterface;
public function createdAt(): DateTimeInterface;
public function toLog(): array;
```

### DateTime Interfaces

The Framework provides interfaces for working with date and time:

```php
<?php

use Atournayre\Contracts\DateTime\DateTimeInterface;

// Interface methods
// (Methods for working with date and time)
```

### Dispatcher Interfaces

The Framework provides interfaces for dispatching events:

```php
<?php

use Atournayre\Contracts\Dispatcher\DispatcherInterface;

// Interface methods
// (Methods for dispatching events)
```

### Event Interfaces

The Framework provides interfaces for working with events:

```php
<?php

use Atournayre\Contracts\Event\HasEventsInterface;
use Atournayre\Contracts\Event\EntityEventDispatcherInterface;

// HasEventsInterface methods
public function initializeEvents(): void;
public function events(): EventCollection;
```

### Exception Interfaces

The Framework provides interfaces for working with exceptions:

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
     * @throws ThrowableInterface Always throws this throwable
     */
    public function throw(): void;

    /**
     * Logs this throwable using the provided logger.
     *
     * @param \Atournayre\Contracts\Log\LoggerInterface $logger  The logger to use
     * @param array                                     $context Additional context information
     *
     * @return void
     */
    public function log(\LoggerInterface $logger, array $context = []): void;
}
```

### Filesystem Interfaces

The Framework provides interfaces for working with the filesystem:

```php
<?php

use Atournayre\Contracts\Filesystem\FilesystemInterface;

// Interface methods
// (Methods for working with the filesystem)
```

### Json Interfaces

The Framework provides interfaces for working with JSON:

```php
<?php

use Atournayre\Contracts\Json\JsonInterface;

// Interface methods
// (Methods for working with JSON)
```

### Log Interfaces

The Framework provides interfaces for logging:

```php
<?php

use Atournayre\Contracts\Log\LoggerInterface;

// Interface methods
public function setLoggerIdentifier(?string $identifier): void;
public function emergency($message, array $context = []): void;
public function alert($message, array $context = []): void;
public function critical($message, array $context = []): void;
public function error($message, array $context = []): void;
public function warning($message, array $context = []): void;
public function notice($message, array $context = []): void;
public function info($message, array $context = []): void;
public function debug($message, array $context = []): void;
public function log($level, $message, array $context = []): void;
public function exception(\Throwable $exception, array $context = []): void;
public function start(array $context = []): void;
public function end(array $context = []): void;
public function success(array $context = []): void;
public function failFast(array $context = []): void;
```

### Mailer Interfaces

The Framework provides interfaces for sending emails:

```php
<?php

use Atournayre\Contracts\Mailer\MailerInterface;

// Interface methods
// (Methods for sending emails)
```

### Null Interfaces

The Framework provides interfaces for implementing the Null Object Pattern:

```php
<?php

use Atournayre\Contracts\Null\NullableInterface;

// Interface methods
public function toNullable(): self; // Convert an object to a nullable version
public function isNull(): bool; // Check if the object is null
public function isNotNull(): bool; // Check if the object is not null
public static function asNull(): self; // Create a null instance
public function orNull(): ?self; // Return the object if not null, otherwise return a null instance
public function orThrow($throwable): self; // Return the object if not null, otherwise throw an exception
```

### Response Interfaces

The Framework provides interfaces for HTTP responses:

```php
<?php

use Atournayre\Contracts\Response\ResponseInterface;

// Interface methods
// (Methods for HTTP responses)
```

### Routing Interfaces

The Framework provides interfaces for routing:

```php
<?php

use Atournayre\Contracts\Routing\RouterInterface;

// Interface methods
// (Methods for routing)
```

### Security Interfaces

The Framework provides interfaces for security:

```php
<?php

use Atournayre\Contracts\Security\SecurityInterface;

// Interface methods
// (Methods for security)
```

### Session Interfaces

The Framework provides interfaces for sessions:

```php
<?php

use Atournayre\Contracts\Session\SessionInterface;

// Interface methods
// (Methods for sessions)
```

### Templating Interfaces

The Framework provides interfaces for templating:

```php
<?php

use Atournayre\Contracts\Templating\TemplatingInterface;

// Interface methods
// (Methods for templating)
```

### Types Interfaces

The Framework provides interfaces for types:

```php
<?php

use Atournayre\Contracts\Types\TypeInterface;

// Interface methods
// (Methods for types)
```

### Uri Interfaces

The Framework provides interfaces for URIs:

```php
<?php

use Atournayre\Contracts\Uri\UriInterface;

// Interface methods
// (Methods for URIs)
```

### TryCatch Interfaces

The Framework provides interfaces for implementing the try-catch-finally pattern with generic type support:

```php
<?php

use Atournayre\Contracts\TryCatch\ExecutableTryCatchInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerInterface;
use Atournayre\Contracts\TryCatch\ThrowableHandlerCollectionInterface;

// ExecutableTryCatchInterface methods
/**
 * @template T
 */
interface ExecutableTryCatchInterface
{
    /**
     * @return T The result of the try block execution
     * @throws ThrowableInterface If an exception is thrown and not handled
     */
    public function execute(): mixed;
}

// ThrowableHandlerInterface methods
/**
 * @template T
 */
interface ThrowableHandlerInterface
{
    public function canHandle(\Throwable $throwable): bool;

    /**
     * @return T The result of handling the throwable
     */
    public function handle(\Throwable $throwable): mixed;
}

// ThrowableHandlerCollectionInterface methods
interface ThrowableHandlerCollectionInterface extends AddInterface
{
    /**
     * @return ThrowableHandlerInterface<mixed>|null
     */
    public function findHandlerFor(\Throwable $throwable): ?ThrowableHandlerInterface;
}
```

For more detailed information about the TryCatch functionality, see the [TryCatch documentation](try-catch.md).
