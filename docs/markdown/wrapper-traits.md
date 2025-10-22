# Wrapper & Traits

Wrappers and utility traits to enrich native objects and add functionality.

## Wrapper

### SplFileInfo

Enriched wrapper of Symfony SplFileInfo (not PHP native SplFileInfo).

```php
use Atournayre\Wrapper\SplFileInfo;

// Creation (requires 3 parameters from Symfony Finder)
$file = SplFileInfo::of(
    file: '/absolute/path/to/file.txt',
    relativePath: 'relative/path',
    relativePathname: 'relative/path/file.txt'
);

// File information
$pathname = $file->pathname(); // Path object
$filename = $file->filename(); // Filename object
$filenameWithoutExt = $file->filenameWithoutExtension(); // StringType
$extension = $file->extension(); // Extension object
$size = $file->size(); // Memory object

// Path information
$relativePath = $file->relativePath(); // Path object
$relativePathname = $file->relativePathname(); // Path object

// Content
$contents = $file->contents(); // Content object

// Logging
$logData = $file->toLog(); // ['pathname' => '...', 'size' => '1.5 MB']
```

### Return Types

All methods return typed value objects:

```php
$pathname = $file->pathname(); // \Atournayre\Common\Types\File\Path
$filename = $file->filename(); // \Atournayre\Common\Types\File\Filename
$extension = $file->extension(); // \Atournayre\Common\Types\File\Extension
$contents = $file->contents(); // \Atournayre\Common\Types\File\Content
$size = $file->size(); // \Atournayre\Common\VO\Memory
```

### Usage with Symfony Finder

SplFileInfo is designed to work with Symfony Finder:

```php
use Symfony\Component\Finder\Finder;
use Atournayre\Wrapper\SplFileInfo;

$finder = new Finder();
$finder->files()->in('/path/to/dir');

foreach ($finder as $symfonyFile) {
    // $symfonyFile is already a Symfony SplFileInfo
    // Wrap it with our SplFileInfo if needed
    $file = SplFileInfo::of(
        file: $symfonyFile->getPathname(),
        relativePath: $symfonyFile->getRelativePath(),
        relativePathname: $symfonyFile->getRelativePathname()
    );

    $size = $file->size(); // Memory object
}
```

## Traits

### DependencyInjectionTrait

Inject EntityDependencyInjection into entities.

```php
use Atournayre\Traits\DependencyInjectionTrait;
use Atournayre\DependencyInjection\EntityDependencyInjection;

class User
{
    use DependencyInjectionTrait;

    // Immutable pattern (preferred)
    public function notifyCreation(): self
    {
        $user = $this->withDependencyInjection(
            dependencyInjection: $this->dependencyInjection
        );

        // Access command bus, query bus, logger
        $this->dependencyInjection->commandBus()->dispatch(command: $event);
        $this->dependencyInjection->logger()->info(message: 'User created');

        return $user;
    }

    // Mutable pattern (for Doctrine PostLoad)
    #[ORM\PostLoad]
    public function postLoad(EntityDependencyInjection $di): void
    {
        $this->setDependencyInjection(dependencyInjection: $di);
    }
}
```

See [Dependency Injection](dependency-injection.md) for details.

### CommandMessageTrait

Self-dispatch commands in events.

```php
use Atournayre\Traits\CommandMessageTrait;
use Atournayre\Common\AbstractCommandEvent;

final class UserCreatedEvent extends AbstractCommandEvent
{
    use CommandMessageTrait;

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

// Self-dispatch via command bus
$event = UserCreatedEvent::new(user: $user);
$event->command(); // Dispatches via CommandBus
```

See [Domain Events](domain-events.md) for details.

### QueryMessageTrait

Self-dispatch queries in events.

```php
use Atournayre\Traits\QueryMessageTrait;
use Atournayre\Common\AbstractQueryEvent;

final class FindUserEvent extends AbstractQueryEvent
{
    use QueryMessageTrait;

    private function __construct(private readonly int $userId) {}

    public static function new(int $userId): self
    {
        return new self(userId: $userId);
    }

    public function userId(): int
    {
        return $this->userId;
    }
}

// Self-dispatch via query bus
$event = FindUserEvent::new(userId: 123);
$user = $event->query(); // Dispatches via QueryBus and returns result
```

See [Domain Events](domain-events.md) for details.

### EnumTrait

Add utility methods to enums.

```php
use Atournayre\Traits\EnumTrait;

enum Status: string
{
    use EnumTrait;

    case Active = 'active';
    case Pending = 'pending';
    case Inactive = 'inactive';
}

// Note: Check actual implementation for available methods
// EnumTrait may provide helper methods for enum manipulation
```

## Usage Patterns

### Dependency Injection in Entities

```php
use Atournayre\Traits\DependencyInjectionTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Order
{
    use DependencyInjectionTrait;

    #[ORM\PostLoad]
    public function postLoad(EntityDependencyInjection $di): void
    {
        $this->setDependencyInjection(dependencyInjection: $di);
    }

    public function complete(): self
    {
        $order = $this->withDependencyInjection(
            dependencyInjection: $this->dependencyInjection
        );

        // Log the event
        $this->dependencyInjection->logger()->info(
            message: 'Order completed',
            context: ['order_id' => $this->id]
        );

        // Dispatch domain event
        OrderCompletedEvent::new(order: $order)->command();

        return $order;
    }
}
```

### Self-Dispatching Events

```php
class UserService
{
    public function register(string $email, string $password): User
    {
        $user = User::create(email: $email, password: $password);

        // Event dispatches itself via CommandBus
        UserRegisteredEvent::new(user: $user)->command();

        return $user;
    }
}
```

## Tests

```php
use PHPUnit\Framework\TestCase;
use Atournayre\Wrapper\SplFileInfo;

class SplFileInfoTest extends TestCase
{
    public function testFileWrapper(): void
    {
        $file = SplFileInfo::of(
            file: __FILE__,
            relativePath: '',
            relativePathname: basename(__FILE__)
        );

        $this->assertEquals('php', $file->extension()->value()->toString());
        $this->assertGreaterThan(0, $file->size()->toBytes());
    }
}
```
