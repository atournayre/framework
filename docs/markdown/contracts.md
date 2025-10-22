# Contracts

The Contracts package provides 200+ interfaces following the Interface Segregation Principle.

## Philosophy

- **Granularity**: Small, focused interfaces
- **Composition**: Combine interfaces with `&`
- **Type safety**: PHPStan templates and generics
- **Flexibility**: Type hint only what you need

## Collection Interfaces

165+ interfaces for collections, inherited from Aimeos Map.
See [Aimeos Map documentation](https://aimeos.org/docs/latest/infrastructure/map/).

---

## CommandBus Interfaces

### CommandBusInterface

```php
namespace Atournayre\Contracts\CommandBus;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;
}
```

### QueryBusInterface

```php
namespace Atournayre\Contracts\CommandBus;

interface QueryBusInterface
{
    public function ask(QueryInterface $query): mixed;
}
```

### CommandInterface

Marker interface for commands (no methods).

```php
namespace Atournayre\Contracts\CommandBus;

interface CommandInterface {}
```

### QueryInterface

Marker interface for queries (no methods).

```php
namespace Atournayre\Contracts\CommandBus;

interface QueryInterface {}
```

---

## Context Interfaces

### ContextInterface

```php
namespace Atournayre\Contracts\Context;

interface ContextInterface extends NullableInterface
{
    public function user(): UserInterface;
    public function createdAt(): DateTimeInterface;

    /**
     * @return array<string, mixed>
     */
    public function toLog(): array;
}
```

### HasContextInterface

```php
namespace Atournayre\Contracts\Context;

interface HasContextInterface
{
    public function hasContext(): bool;
}
```

---

## DateTime Interface

**Note**: DateTimeInterface contains 400+ methods based on Carbon library.
See [primitives.md](primitives.md#datetime) for commonly used methods.

Full interface: `src/Contracts/DateTime/DateTimeInterface.php`

---

## DependencyInjection Interfaces

### DependencyInjectionInterface

```php
namespace Atournayre\Contracts\DependencyInjection;

interface DependencyInjectionInterface
{
    public function commandBus(): CommandBusInterface;
    public function queryBus(): QueryBusInterface;
    public function logger(): LoggerInterface;
}
```

### DependencyInjectionAwareInterface

```php
namespace Atournayre\Contracts\DependencyInjection;

interface DependencyInjectionAwareInterface
{
    /**
     * Immutable pattern (preferred).
     */
    public function withDependencyInjection(DependencyInjectionInterface $dependencyInjection): static;

    /**
     * Mutable pattern (for Doctrine PostLoad).
     */
    public function setDependencyInjection(DependencyInjectionInterface $dependencyInjection): void;

    /**
     * @throws ThrowableInterface When not set
     */
    public function dependencyInjection(): DependencyInjectionInterface;
}
```

### PostLoadHandlerInterface

```php
namespace Atournayre\Contracts\DependencyInjection;

interface PostLoadHandlerInterface
{
    public function __invoke(PostLoadEventArgs $args): void;
}
```

---

## Event Interfaces

### EntityEventDispatcherInterface

```php
namespace Atournayre\Contracts\Event;

interface EntityEventDispatcherInterface
{
    public function dispatch(EventCollection $eventCollection, ?string $type = null): void;
}
```

### HasEventsInterface

```php
namespace Atournayre\Contracts\Event;

interface HasEventsInterface
{
    public function initializeEvents(): void;
    public function events(): EventCollection;
}
```

---

## Exception Interface

### ThrowableInterface

```php
namespace Atournayre\Contracts\Exception;

interface ThrowableInterface extends \Throwable
{
    public static function new(string $message = '', int $code = 0): self;
    public static function fromThrowable(\Throwable $throwable): self;
    public function withPrevious(\Throwable $previous): self;

    /**
     * @param array<array-key, mixed> $context
     * @throws ThrowableInterface
     */
    public function throw(?LoggerInterface $logger = null, array $context = []): void;
}
```

---

## Filesystem Interface

```php
namespace Atournayre\Contracts\Filesystem;

interface FilesystemInterface
{
    public static function from(string $directoryOrFile): self;

    public function createDirectory(string $directory): void;
    public function removeDirectory(string $directory): void;
    public function removeFile(string $file): void;
    public function createFile(string $file, string $content): void;
    public function copyFile(string $source, string $destination): void;
    public function copyDirectory(string $source, string $destination): void;
    public function moveFile(string $source, string $destination): void;
    public function moveDirectory(string $source, string $destination): void;
    public function renameFile(string $source, string $destination): void;
    public function renameDirectory(string $source, string $destination): void;

    public function exists(): BoolEnum;
    public function isFile(): BoolEnum;
    public function isDirectory(): BoolEnum;
    public function isNotEmpty(): BoolEnum;
    public function isEmpty(): BoolEnum;
    public function countFiles(): int;
    public function listFiles(): FileCollection;
    public function countDirectories(): int;
    public function listDirectories(): FileCollection;
    public function isReadable(): BoolEnum;
    public function isWritable(): BoolEnum;
    public function isExecutable(): BoolEnum;
    public function isLink(): BoolEnum;
}
```

---

## JSON Interface

### ToJsonInterface

```php
namespace Atournayre\Contracts\Json;

interface ToJsonInterface
{
    /**
     * @param array<string, mixed> $options
     */
    public function json(array $options = []): string;
}
```

---

## Logging Interfaces

### LoggableInterface

```php
namespace Atournayre\Contracts\Log;

interface LoggableInterface
{
    // @phpstan-ignore-next-line
    public function toLog(): array;
}
```

### LoggerInterface

```php
namespace Atournayre\Contracts\Log;

interface LoggerInterface extends \Psr\Log\LoggerInterface
{
    public function setLoggerIdentifier(?string $identifier): void;

    /**
     * PSR-3 methods (inherited from \Psr\Log\LoggerInterface)
     * @param \Stringable|string $message
     */
    public function emergency($message, array $context = []): void;
    public function alert($message, array $context = []): void;
    public function critical($message, array $context = []): void;
    public function error($message, array $context = []): void;
    public function warning($message, array $context = []): void;
    public function notice($message, array $context = []): void;
    public function info($message, array $context = []): void;
    public function debug($message, array $context = []): void;
    public function log($level, $message, array $context = []): void;

    // Custom methods
    // @phpstan-ignore-next-line
    public function exception(\Throwable $exception, array $context = []): void;
    public function start(array $context = []): void;
    public function end(array $context = []): void;
    public function success(array $context = []): void;
    public function failFast(array $context = []): void;
}
```

---

## Mailer Interface

### SendMailInterface

```php
namespace Atournayre\Contracts\Mailer;

interface SendMailInterface
{
    /**
     * @throws ThrowableInterface
     */
    // @phpstan-ignore-next-line
    public function send($message, $envelope = null): void;
}
```

---

## Null Interface

### NullableInterface

```php
namespace Atournayre\Contracts\Null;

interface NullableInterface
{
    public function toNullable(): self;
    public function isNull(): bool;
    public function isNotNull(): bool;
    public static function asNull(): self;
    public function orNull(): ?self;

    /**
     * @param \Throwable|callable $throwable
     * @return $this
     * @throws ThrowableInterface
     */
    public function orThrow($throwable): self;
}
```

---

## Persistence Interfaces

### AllowFlushInterface

Marker interface for automatic transaction management (no methods).

```php
namespace Atournayre\Contracts\Persistance;

interface AllowFlushInterface {}
```

### DatabaseEntityInterface

```php
namespace Atournayre\Contracts\Persistance;

interface DatabaseEntityInterface
{
    public function database(): DatabasePersistenceInterface;
}
```

### DatabasePersistenceInterface

```php
namespace Atournayre\Contracts\Persistance;

interface DatabasePersistenceInterface
{
    public function persist(): self;
    public function flush(): void;
    public function remove(): self;
}
```

---

## Response Interface

```php
namespace Atournayre\Contracts\Response;

interface ResponseInterface
{
    public function redirectToUrl(string $url);

    /**
     * @param array<string, mixed> $parameters
     */
    public function redirectToRoute(string $route, array $parameters = []);

    /**
     * @param array<string, mixed> $parameters
     */
    public function render(string $view, array $parameters = []);

    /**
     * @param array<string|int, mixed> $data
     * @param array<string, mixed> $headers
     */
    public function json(array $data, int $status = 200, array $headers = [], bool $json = false);

    /**
     * @param array<string|int, mixed> $data
     * @param array<string, mixed> $headers
     */
    public function jsonError(array $data, int $status = 400, array $headers = [], bool $json = false);

    /**
     * @param array<string, mixed> $headers
     */
    public function file(string $file, string $filename, array $headers = []);

    /**
     * @param array<string, mixed> $headers
     */
    public function empty(int $status = 204, array $headers = []);

    /**
     * @param array<string, mixed> $parameters
     */
    public function error(string $view, array $parameters = [], int $status = 500);
}
```

---

## Routing Interface

```php
namespace Atournayre\Contracts\Routing;

interface RoutingInterface
{
    public const ABSOLUTE_URL = 0;
    public const ABSOLUTE_PATH = 1;
    public const RELATIVE_PATH = 2;
    public const NETWORK_PATH = 3;

    /**
     * @param array<string, mixed> $parameters
     */
    public function generate(string $name, array $parameters = [], int $referenceType = self::ABSOLUTE_PATH): string;
}
```

---

## Security Interfaces

### SecurityInterface

```php
namespace Atournayre\Contracts\Security;

interface SecurityInterface
{
    public function user(): UserInterface;
}
```

### UserInterface

```php
namespace Atournayre\Contracts\Security;

interface UserInterface extends NullableInterface
{
    // @phpstan-ignore-next-line
    public function getRoles();
    public function getPassword();
    public function getSalt();
    public function getUsername();
    public function eraseCredentials();
    public function identifier(): string;
}
```

---

## Session Interface

### FlashBagInterface

```php
namespace Atournayre\Contracts\Session;

interface FlashBagInterface
{
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
    public const ERROR = 'danger';
    public const INFO = 'info';

    /**
     * @param string|array<string> $message
     */
    public function success($message): void;
    public function warning($message): void;
    public function error($message): void;
    public function info($message): void;

    /**
     * Use with caution, displays error messages from exceptions.
     */
    public function fromException(\Exception $exception): void;
}
```

---

## Templating Interface

```php
namespace Atournayre\Contracts\Templating;

interface TemplatingInterface
{
    /**
     * @param array<string, mixed> $parameters
     * @throws ThrowableInterface
     */
    public function render(string $template, array $parameters = []): string;
}
```

---

## TryCatch Interfaces

### ExecutableTryCatchInterface

```php
namespace Atournayre\Contracts\TryCatch;

/**
 * @template T
 */
interface ExecutableTryCatchInterface
{
    /**
     * @return T
     * @throws ThrowableInterface
     */
    public function execute(): mixed;
}
```

### ThrowableHandlerInterface

```php
namespace Atournayre\Contracts\TryCatch;

/**
 * @template T
 */
interface ThrowableHandlerInterface
{
    public function canHandle(\Throwable $throwable): bool;

    /**
     * @return T
     */
    public function handle(\Throwable $throwable): mixed;
}
```

### ThrowableHandlerCollectionInterface

```php
namespace Atournayre\Contracts\TryCatch;

interface ThrowableHandlerCollectionInterface extends AddInterface
{
    /**
     * @return ThrowableHandlerInterface<mixed>|null
     */
    public function findHandlerFor(\Throwable $throwable): ?ThrowableHandlerInterface;
}
```

---

## Types Interface

### TypeValidationInterface

```php
namespace Atournayre\Contracts\Types;

interface TypeValidationInterface
{
    public function validate(): ValidationCollection;
}
```

---

## Uri Interface

PSR-7 compliant URI interface (adapted for Elegant Objects).

**Note**: UriInterface has 20+ methods for URI manipulation.
See `src/Contracts/Uri/UriInterface.php` for full interface or [common.md](common.md#uri) for usage examples.

Key methods:
```php
namespace Atournayre\Contracts\Uri;

interface UriInterface
{
    // Getters
    public function scheme(): string;
    public function authority(): string;
    public function userInfo(): string;
    public function host(): string;
    public function port(): ?int;
    public function path(): string;
    public function query(): string;
    public function fragment(): string;

    // Immutable setters
    public function withScheme(string $scheme): UriInterface;
    public function withUserInfo(string $user): UriInterface;
    public function withUserAndPassword(string $user, string $password): UriInterface;
    public function withHost(string $host): UriInterface;
    public function withPort(int $port): UriInterface;
    public function withoutPort(): UriInterface;
    public function withPath(string $path): UriInterface;
    public function withQuery(string $query): UriInterface;
    public function withFragment(string $fragment): UriInterface;

    // Conversion
    public function __toString(): string;
    public function toString(): string;
}
```

---

## Assert Interfaces

The Assert system provides 8 interfaces with 100+ assertion methods based on Webmozart Assert.

Due to the large number of methods (100+), only key interfaces are shown. 

See `src/Contracts/Common/Assert/` for complete interfaces.

### AssertInterface

```php
namespace Atournayre\Contracts\Common\Assert;

interface AssertInterface
{
    public static function true(mixed $value, string $message = ''): void;
    public static function false(mixed $value, string $message = ''): void;
    public static function ip(mixed $value, string $message = ''): void;
    public static function ipv4(mixed $value, string $message = ''): void;
    public static function ipv6(mixed $value, string $message = ''): void;
    public static function email(mixed $value, string $message = ''): void;
    public static function uniqueValues(array $values, string $message = ''): void;
    public static function eq(mixed $value, mixed $expect, string $message = ''): void;
    public static function same(mixed $value, mixed $expect, string $message = ''): void;
    public static function greaterThan(mixed $value, mixed $limit, string $message = ''): void;
    public static function greaterThanEq(mixed $value, mixed $limit, string $message = ''): void;
    public static function lessThan(mixed $value, mixed $limit, string $message = ''): void;
    public static function lessThanEq(mixed $value, mixed $limit, string $message = ''): void;
    public static function range(mixed $value, mixed $min, mixed $max, string $message = ''): void;
    public static function oneOf(mixed $value, array $values, string $message = ''): void;
    // ... 30+ more methods
}
```

### AssertStringInterface

```php
namespace Atournayre\Contracts\Common\Assert;

interface AssertStringInterface
{
    public static function string(mixed $value, string $message = ''): void;
    public static function stringNotEmpty(mixed $value, string $message = ''): void;
}
```

### AssertNumericInterface

```php
namespace Atournayre\Contracts\Common\Assert;

interface AssertNumericInterface
{
    public static function integer(mixed $value, string $message = ''): void;
    public static function integerish(mixed $value, string $message = ''): void;
    public static function positiveInteger(mixed $value, string $message = ''): void;
    public static function float(mixed $value, string $message = ''): void;
    public static function numeric(mixed $value, string $message = ''): void;
    public static function natural(mixed $value, string $message = ''): void;
}
```

### AssertNotInterface

```php
namespace Atournayre\Contracts\Common\Assert;

interface AssertNotInterface
{
    public static function notInstanceOf(mixed $value, string|object $class, string $message = ''): void;
    public static function notEmpty(mixed $value, string $message = ''): void;
    public static function notNull(mixed $value, string $message = ''): void;
    public static function notFalse(mixed $value, string $message = ''): void;
    public static function notEq(mixed $value, mixed $expect, string $message = ''): void;
    public static function notSame(mixed $value, mixed $expect, string $message = ''): void;
    public static function notContains(string $value, string $subString, string $message = ''): void;
    public static function notWhitespaceOnly(string $value, string $message = ''): void;
    public static function notStartsWith(string $value, string $prefix, string $message = ''): void;
    public static function notEndsWith(string $value, string $suffix, string $message = ''): void;
    public static function notRegex(string $value, string $pattern, string $message = ''): void;
}
```

### AssertIsInterface

```php
namespace Atournayre\Contracts\Common\Assert;

interface AssertIsInterface
{
    public static function isCallable(mixed $value, string $message = ''): void;
    public static function isArray(mixed $value, string $message = ''): void;
    public static function isArrayAccessible(mixed $value, string $message = ''): void;
    public static function isCountable(mixed $value, string $message = ''): void;
    public static function isIterable(mixed $value, string $message = ''): void;
    public static function isInstanceOf(mixed $value, string|object $class, string $message = ''): void;
    public static function isInstanceOfAny(mixed $value, array $classes, string $message = ''): void;
    public static function isAOf(object|string $value, string $class, string $message = ''): void;
    public static function isNotA(object|string $value, string $class, string $message = ''): void;
    public static function isAnyOf(object|string $value, array $classes, string $message = ''): void;
    public static function isEmpty(mixed $value, string $message = ''): void;
    public static function isList(array $array, string $message = ''): void;
    public static function isNonEmptyList(array $array, string $message = ''): void;
    public static function isMap(array $array, string $message = ''): void;
    public static function isNonEmptyMap(array $array, string $message = ''): void;
    // ... 10+ more methods
}
```

### AssertNullInterface

```php
namespace Atournayre\Contracts\Common\Assert;

interface AssertNullInterface
{
    public static function null(mixed $value, string $message = ''): void;
    public static function nullOrString(mixed $value, string $message = ''): void;
    public static function nullOrStringNotEmpty(mixed $value, string $message = ''): void;
    public static function nullOrInteger(mixed $value, string $message = ''): void;
    public static function nullOrIntegerish(mixed $value, string $message = ''): void;
    public static function nullOrPositiveInteger(mixed $value, string $message = ''): void;
    public static function nullOrFloat(mixed $value, string $message = ''): void;
    public static function nullOrNumeric(mixed $value, string $message = ''): void;
    public static function nullOrNatural(mixed $value, string $message = ''): void;
    public static function nullOrBoolean(mixed $value, string $message = ''): void;
    public static function nullOrScalar(mixed $value, string $message = ''): void;
    public static function nullOrObject(mixed $value, string $message = ''): void;
    public static function nullOrResource(mixed $value, ?string $type = null, string $message = ''): void;
    public static function nullOrIsCallable(mixed $value, string $message = ''): void;
    public static function nullOrIsArray(mixed $value, string $message = ''): void;
    public static function nullOrIsArrayAccessible(mixed $value, string $message = ''): void;
    public static function nullOrIsCountable(mixed $value, string $message = ''): void;
    // ... 20+ more methods
}
```

### AssertAllInterface

```php
namespace Atournayre\Contracts\Common\Assert;

interface AssertAllInterface
{
    public static function allString(mixed $value, string $message = ''): void;
    public static function allNullOrString(mixed $value, string $message = ''): void;
    public static function allStringNotEmpty(mixed $value, string $message = ''): void;
    public static function allNullOrStringNotEmpty(mixed $value, string $message = ''): void;
    public static function allInteger(mixed $value, string $message = ''): void;
    public static function allNullOrInteger(mixed $value, string $message = ''): void;
    public static function allIntegerish(mixed $value, string $message = ''): void;
    public static function allNullOrIntegerish(mixed $value, string $message = ''): void;
    public static function allPositiveInteger(mixed $value, string $message = ''): void;
    public static function allNullOrPositiveInteger(mixed $value, string $message = ''): void;
    public static function allFloat(mixed $value, string $message = ''): void;
    public static function allNullOrFloat(mixed $value, string $message = ''): void;
    public static function allNumeric(mixed $value, string $message = ''): void;
    public static function allNullOrNumeric(mixed $value, string $message = ''): void;
    public static function allNatural(mixed $value, string $message = ''): void;
    public static function allNullOrNatural(mixed $value, string $message = ''): void;
    public static function allBoolean(mixed $value, string $message = ''): void;
    public static function allNullOrBoolean(mixed $value, string $message = ''): void;
    // ... 30+ more methods
}
```

### AssertMiscInterface

```php
namespace Atournayre\Contracts\Common\Assert;

interface AssertMiscInterface
{
    public static function boolean(mixed $value, string $message = ''): void;
    public static function scalar(mixed $value, string $message = ''): void;
    public static function object(mixed $value, string $message = ''): void;
    public static function resource(mixed $value, ?string $type = null, string $message = ''): void;
}
```

---

## Summary

- **41 interfaces** documented (excluding Collection interfaces)
- **Collection interfaces**: 165+ (see Aimeos Map)
- **Total**: 200+ interfaces

All interfaces follow:
- Interface Segregation Principle
- Immutability where applicable
- PHPStan template support
- Elegant Objects rules
