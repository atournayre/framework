# Common

The Common package provides essential utilities: assertions, custom exceptions, and value objects.

## Assert

Assertion system wrapping Webmozart Assert with custom message support.

### Basic Usage

```php
use Atournayre\Common\Assert\Assert;

// String validation
Assert::stringNotEmpty(value: $name, message: 'Name cannot be empty');
Assert::minLength(value: $password, min: 8, message: 'Password too short');

// Numeric validation
Assert::greaterThan(value: $age, limit: 0, message: 'Age must be positive');
Assert::range(value: $score, min: 0, max: 100);

// Array validation
Assert::notEmpty(value: $items, message: 'Items cannot be empty');
Assert::allIsInstanceOf(value: $users, class: User::class);

// Type validation
Assert::isInstanceOf(value: $user, class: User::class);
Assert::uuid(value: $id, message: 'Invalid UUID format');
```

### Common Assertions

```php
// Null/NotNull
Assert::notNull(value: $value);
Assert::null(value: $value);

// Boolean
Assert::true(value: $condition);
Assert::false(value: $condition);

// String
Assert::string(value: $text);
Assert::email(value: $email);
Assert::url(value: $website);
Assert::startsWith(value: $text, prefix: 'https://');
Assert::endsWith(value: $filename, suffix: '.php');

// Numeric
Assert::integer(value: $count);
Assert::float(value: $price);
Assert::numeric(value: $value);
Assert::positiveInteger(value: $quantity);

// Array
Assert::isArray(value: $data);
Assert::keyExists(array: $data, key: 'id');
Assert::count(array: $items, number: 5);
Assert::minCount(array: $items, min: 1);

// Object
Assert::object(value: $entity);
Assert::classExists(value: MyClass::class);
Assert::implementsInterface(value: $service, interface: ServiceInterface::class);
```

### Collection Assertions

```php
// All elements must satisfy
Assert::allString(value: $names);
Assert::allInteger(value: $numbers);
Assert::allIsInstanceOf(value: $entities, class: Entity::class);

// At least one element must satisfy
Assert::inArray(value: $status, array: ['active', 'pending']);
```

## Exceptions

Custom exception hierarchy with fluent interfaces.

### Hierarchy

```php
use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Common\Exception\UnexpectedValueException;
use Atournayre\Common\Exception\BadMethodCallException;
use Atournayre\Common\Exception\MutableException;
use Atournayre\Common\Exception\NullException;
```

### InvalidArgumentException

```php
use Atournayre\Common\Exception\InvalidArgumentException;

// Simple creation
throw InvalidArgumentException::new(message: 'Invalid value provided', code: 0);

// With previous exception
$exception = InvalidArgumentException::new(message: 'Invalid value')
    ->withPrevious(previous: $previousException);

// From existing throwable
$exception = InvalidArgumentException::fromThrowable(throwable: $existingException);

// Throw with optional logging
InvalidArgumentException::new(message: 'Error')->throw(logger: $logger, context: ['key' => 'value']);
```

### RuntimeException

```php
use Atournayre\Common\Exception\RuntimeException;

// Same API as InvalidArgumentException
throw RuntimeException::new(message: 'Operation failed', code: 0);

// With previous exception
throw RuntimeException::new(message: 'Database error')
    ->withPrevious(previous: $dbException);
```

### UnexpectedValueException

```php
use Atournayre\Common\Exception\UnexpectedValueException;

// Same API as other exceptions
throw UnexpectedValueException::new(message: 'Unexpected status', code: 0);
```

### MutableException

```php
use Atournayre\Common\Exception\MutableException;

// To indicate an object should not be modified
throw MutableException::new(message: 'Cannot modify immutable object');
```

### NullException

```php
use Atournayre\Common\Exception\NullException;

// For unexpected null values
throw NullException::new(message: 'Value cannot be null');
```

### ThrowableTrait

Trait for creating custom exceptions. Provides consistent API for all exceptions.

```php
use Atournayre\Common\Exception\ThrowableTrait;
use Atournayre\Contracts\Exception\ThrowableInterface;

class CustomException extends \Exception implements ThrowableInterface
{
    use ThrowableTrait;
}

// Usage - Available methods from trait:

// Create new instance
throw CustomException::new(message: 'Custom error', code: 500);

// Chain with previous exception
throw CustomException::new(message: 'Error')
    ->withPrevious(previous: $previousException);

// Create from existing throwable
throw CustomException::fromThrowable(throwable: $existingException);

// Throw with logging
CustomException::new(message: 'Error')->throw(
    logger: $logger,
    context: ['user_id' => 123]
);
```

## Value Objects

### Context

Immutable context object for logging with user and timestamp:

```php
use Atournayre\Common\VO\Context\Context;
use Atournayre\Contracts\Security\UserInterface;

// Creation
$context = Context::create(
    user: $user, // UserInterface
    createdAt: new \DateTimeImmutable()
);

// Access
$user = $context->user();
$createdAt = $context->createdAt();

// For logging (implements LoggableInterface)
$logData = $context->toLog();
// Returns: ['user' => 'user_identifier', 'createdAt' => '2025-01-15 10:30:00']

// Null context
$nullContext = Context::asNull();
```

### Duration

Represents a time duration in milliseconds:

```php
use Atournayre\Common\VO\Duration;

// Creation (always from milliseconds)
$duration = Duration::of(milliseconds: 3600000); // 1 hour

// Access
$ms = $duration->milliseconds(); // 3600000
$ms = $duration->asIs(); // same as milliseconds()
$seconds = $duration->inSeconds(); // 3600.0
$minutes = $duration->inMinutes(); // 60.0
$hours = $duration->inHours(); // 1.0
$days = $duration->inDays(); // 0.041666...

// Human readable format
$formatted = $duration->humanReadable(); // "1 hour"
$formatted = $duration->humanReadable(glue: ', '); // "1 hour"
```

### Memory

Represents a memory amount in bytes:

```php
use Atournayre\Common\VO\Memory;

// Creation (always from bytes)
$memory = Memory::fromBytes(bytes: 1048576); // 1 MB

// Access
$bytes = $memory->asIs(); // 1048576
$kb = $memory->inKilobytes(); // 1024.0
$mb = $memory->inMegabytes(); // 1.0
$gb = $memory->inGigabytes(); // 0.0009765625
$tb = $memory->inTerabytes(); // 0.00000095367...

// Comparison
$isEqual = $memory->equalsTo(size: 1048576); // BoolEnum

// Human readable format
$formatted = $memory->humanReadable(); // "1.00 MB"
```

### Uri

Value object for URIs implementing PSR-7 UriInterface:

```php
use Atournayre\Common\VO\Uri;

// Creation
$uri = Uri::of(uri: 'https://user:pass@example.com:8080/path?query=value#fragment');

// Access components
$scheme = $uri->scheme();        // "https"
$authority = $uri->authority();  // "user:pass@example.com:8080"
$userInfo = $uri->userInfo();    // "user:pass"
$host = $uri->host();            // "example.com"
$port = $uri->port();            // 8080
$path = $uri->path();            // "/path"
$query = $uri->query();          // "query=value"
$fragment = $uri->fragment();    // "fragment"

// Immutable modifications (PSR-7)
$newUri = $uri->withScheme(scheme: 'http');
$newUri = $uri->withHost(host: 'newdomain.com');
$newUri = $uri->withPath(path: '/new/path');
$newUri = $uri->withQuery(query: 'key=value');
$newUri = $uri->withUserInfo(user: 'username');
$newUri = $uri->withUserAndPassword(user: 'user', password: 'pass');

// Conversion
$string = $uri->toString();
$string = (string) $uri; // __toString()
```

### PlainPassword

Simple wrapper around StringType for plain text passwords:

```php
use Atournayre\Common\VO\Security\PlainPassword;
use Atournayre\Primitives\StringType;

// Creation (wraps StringType)
$password = PlainPassword::of(value: StringType::of(value: 'MyPassword123'));

// StringType methods available via StringTypeTrait
$length = $password->length();
$isEmpty = $password->isEmpty();

// Null password
$nullPassword = PlainPassword::asNull();
$isNull = $nullPassword->isNull();

// Note: PlainPassword is just a StringType wrapper
// Use Symfony PasswordHasher for actual hashing/verification
```

### Event (Deprecated)

!!! warning
    **DEPRECATED**: This class is deprecated and will be removed in a future version.
    Use the Domain Events Management system with `AbstractCommandEvent`/`AbstractQueryEvent` instead.
    See [Domain Events](domain-events.md).

```php
use Atournayre\Common\VO\Event;
use Symfony\Component\Messenger\MessageBusInterface;

// Event extends and uses ContextTrait (not a simple factory)
// Must be extended, cannot be used directly

class UserCreatedEvent extends Event
{
    // Custom implementation
}

$event = new UserCreatedEvent();

// Available methods from Event:
$identifier = $event->_identifier(); // spl_object_hash
$type = $event->_type(); // static::class
$event->stopPropagation();
$isStopped = $event->isPropagationStopped(); // bool

// Dispatch via message bus
$event->dispatch(messageBus: $messageBus);

// Logging
$logData = $event->toLog(); // ['identifier' => '...', 'type' => '...']
```

## Domain Events

New event classes:

```php
use Atournayre\Common\AbstractCommandEvent;
use Atournayre\Common\AbstractQueryEvent;

// Command event
final class UserCreatedEvent extends AbstractCommandEvent
{
    private function __construct(private readonly User $user) {}

    public static function new(User $user): self
    {
        return new self(user: $user);
    }

    public function user(): User
    {
        return $this->user;
    }
}

// Query event
final class UserFoundEvent extends AbstractQueryEvent
{
    private function __construct(private readonly User $user) {}

    public static function new(User $user): self
    {
        return new self(user: $user);
    }

    public function user(): User
    {
        return $this->user;
    }
}
```

## Usage Patterns

### Validation with Assert

```php
class UserService
{
    public function createUser(string $email, string $password): User
    {
        Assert::email(value: $email, message: 'Invalid email format');
        Assert::minLength(value: $password, min: 8, message: 'Password too short');

        return User::new(email: $email, password: $password);
    }
}
```

### Error Handling with Exceptions

```php
class PaymentService
{
    public function processPayment(Payment $payment): void
    {
        if ($payment->amount()->isNegative()) {
            InvalidArgumentException::new(message: 'Amount must be positive')
                ->throw(logger: $this->logger, context: ['amount' => $payment->amount()->value()]);
        }

        try {
            $this->gateway->charge($payment);
        } catch (GatewayException $e) {
            RuntimeException::new(message: 'Payment processing failed')
                ->withPrevious(previous: $e)
                ->throw(logger: $this->logger, context: ['payment_id' => $payment->id()]);
        }
    }
}
```

### Context for Logging

```php
$context = Context::create(
    user: $user,
    createdAt: new \DateTimeImmutable()
);

$logger->info(message: 'User logged in', context: $context->toLog());
// Logs: ['user' => 'user_identifier', 'createdAt' => '2025-01-15 10:30:00']
```

## Tests

```php
use PHPUnit\Framework\TestCase;
use Atournayre\Common\Assert\Assert;
use Atournayre\Common\Exception\InvalidArgumentException;

class AssertTest extends TestCase
{
    public function testStringNotEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Assert::stringNotEmpty(value: '', message: 'String cannot be empty');
    }

    public function testEmail(): void
    {
        Assert::email(value: 'test@example.com');
        $this->assertTrue(true);
    }
}
```
