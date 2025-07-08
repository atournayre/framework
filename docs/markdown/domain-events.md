# Domain Events Management

This guide provides documentation for the Domain Events Management system in the Framework. This system enables Command Query Responsibility Segregation (CQRS) patterns and dependency injection in entities using Symfony's Messenger component.

## Architecture Overview

The domain events management system consists of several key components:

- **Command Bus**: For dispatching commands (write operations)
- **Query Bus**: For dispatching queries (read operations)
- **Dependency Injection**: For injecting services into entities
- **Doctrine Integration**: Automatic dependency injection after entity loading

## Command Bus System

### CommandBusInterface

The `CommandBusInterface` is responsible for dispatching commands to their appropriate handlers.

For a more fluent interface, you can extend `AbstractCommandEvent` which provides a static constructor and dispatch method:

```php
<?php

use Atournayre\Common\AbstractCommandEvent;
use Atournayre\Contracts\CommandBus\CommandBusInterface;

class MyCommand extends AbstractCommandEvent
{
    public function __construct(
        public readonly string $data
    ) {}
}

// New fluent way - Create and dispatch in one line
MyCommand::new('some data')->dispatch($commandBus);
```

### QueryBusInterface

The `QueryBusInterface` is responsible for dispatching queries and returning results.

For a more fluent interface, you can extend `AbstractQueryEvent` which provides a static constructor and dispatch method:

```php
<?php

use Atournayre\Common\AbstractQueryEvent;
use Atournayre\Contracts\CommandBus\QueryBusInterface;

class MyQuery extends AbstractQueryEvent
{
    public function __construct(
        public readonly int $userId
    ) {}
}

// New fluent way - Create and dispatch in one line
$result = MyQuery::new(123)->query($queryBus);
```

### Command and Query Interfaces

Use these interfaces to tag your messages for Symfony Messenger:

```php
<?php

use Atournayre\Contracts\CommandBus\CommandInterface;
use Atournayre\Contracts\CommandBus\QueryInterface;

// Command for async processing
class CreateUserCommand implements CommandInterface
{
    public function __construct(
        public readonly string $email,
        public readonly string $name
    ) {}
}

// Query for sync processing
class GetUserQuery implements QueryInterface
{
    public function __construct(
        public readonly int $userId
    ) {}
}
```

### Using Abstract Classes (Recommended)

For a more fluent interface, extend the abstract classes:

```php
<?php

use Atournayre\Common\AbstractCommandEvent;
use Atournayre\Common\AbstractQueryEvent;

// Command for async processing with fluent interface
class CreateUserCommand extends AbstractCommandEvent
{
    public function __construct(
        public readonly string $email,
        public readonly string $name
    ) {}
}

// Query for sync processing with fluent interface
class GetUserQuery extends AbstractQueryEvent
{
    public function __construct(
        public readonly int $userId
    ) {}
}

// Usage examples:
CreateUserCommand::new('user@example.com', 'John Doe')->dispatch($commandBus);
$user = GetUserQuery::new(123)->query($queryBus);
```

### Message Traits

Use the provided traits to add dispatch capabilities to your messages:

```php
<?php

use Atournayre\Contracts\CommandBus\CommandInterface;
use Atournayre\Contracts\CommandBus\QueryInterface;
use Atournayre\Traits\CommandMessageTrait;
use Atournayre\Traits\QueryMessageTrait;

class CreateUserCommand implements CommandInterface
{
    use CommandMessageTrait;

    // Now you can call: $command->command($commandBus);
}

class GetUserQuery implements QueryInterface
{
    use QueryMessageTrait;

    // Now you can call: $result = $query->query($queryBus);
}
```

## Dependency Injection System

### DependencyInjectionInterface

The main interface for accessing injected services:

```php
<?php

use Atournayre\Contracts\DependencyInjection\DependencyInjectionInterface;

// Access services through dependency injection
$commandBus = $dependencyInjection->commandBus();
$queryBus = $dependencyInjection->queryBus();
$logger = $dependencyInjection->logger();
```

### Making Entities Dependency Injection Aware

Use the trait and interface to enable dependency injection in your entities:

```php
<?php

use Atournayre\Contracts\DependencyInjection\DependencyInjectionAwareInterface;
use Atournayre\Traits\DependencyInjectionTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class User implements DependencyInjectionAwareInterface
{
    use DependencyInjectionTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    private int $id;

    public function doSomething(): void
    {
        // Access injected services
        $this->dependencyInjection()->logger()->info('User action performed');

        // Dispatch commands or queries
        SomeCommand::new()
            ->dispatch($this->dependencyInjection()->commandBus());
        
        $result = SomeQuery::new()
            ->query($this->dependencyInjection()->queryBus());
    }
}
```

## Symfony Configuration

### Messenger Configuration

Configure Symfony Messenger to handle commands and queries differently:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        default_bus: command.bus
        buses:
            command.bus:
                middleware:
                    - validation
                    - doctrine_transaction
            query.bus:
                middleware:
                    - validation

        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
            sync: 'sync://'

        routing:
            # Route commands to async transport
            'Atournayre\Contracts\CommandBus\CommandInterface': async
            # Route queries to sync transport
            'Atournayre\Contracts\CommandBus\QueryInterface': sync
```

### Service Configuration

Configure the dependency injection services:

```yaml
# config/services.yaml
services:
    # Command and Query buses
    Atournayre\Contracts\CommandBus\CommandBusInterface:
        alias: command.bus

    Atournayre\Contracts\CommandBus\QueryBusInterface:
        alias: query.bus

    # Entity dependency injection
    Atournayre\DependencyInjection\EntityDependencyInjection:
        arguments:
            $commandBus: '@Atournayre\Contracts\CommandBus\CommandBusInterface'
            $queryBus: '@Atournayre\Contracts\CommandBus\QueryBusInterface'
            $logger: '@logger'

    # Doctrine PostLoad listener
    Atournayre\DependencyInjection\DependencyInjectionPostLoadListener:
        arguments:
            $entityDependencyInjection: '@Atournayre\DependencyInjection\EntityDependencyInjection'
        tags:
            - { name: doctrine.event_listener, event: postLoad }
```

### Environment Variables

Set up your messenger transport:

```bash
# .env
MESSENGER_TRANSPORT_DSN=doctrine://default?queue_name=messenger_messages
```

## Usage Examples

### Creating a Command Handler

```php
<?php

use Atournayre\Common\AbstractCommandEvent;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

class CreateUserCommand extends AbstractCommandEvent
{
    public function __construct(
        public readonly string $email,
        public readonly string $name
    ) {}
}

#[AsMessageHandler]
class CreateUserCommandHandler
{
    public function __invoke(CreateUserCommand $command): void
    {
        // Handle the command
        // This will be processed asynchronously
    }
}

// Usage:
CreateUserCommand::new('user@example.com', 'John Doe')->dispatch($commandBus);
```

### Creating a Query Handler

```php
<?php

use Atournayre\Common\AbstractQueryEvent;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

class GetUserQuery extends AbstractQueryEvent
{
    public function __construct(
        public readonly int $userId
    ) {}
}

#[AsMessageHandler]
class GetUserQueryHandler
{
    public function __invoke(GetUserQuery $query): array
    {
        // Handle the query and return result
        // This will be processed synchronously
        return ['id' => $query->userId, 'name' => 'John Doe'];
    }
}

// Usage:
$user = GetUserQuery::new(123)->query($queryBus);
```

### Using in Entities

```php
<?php

use Atournayre\Contracts\DependencyInjection\DependencyInjectionAwareInterface;
use Atournayre\Traits\DependencyInjectionTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Order implements DependencyInjectionAwareInterface
{
    use DependencyInjectionTrait;

    public function complete(): void
    {
        $this->status = 'completed';

        SendOrderConfirmationCommand::new($this->id)
            ->dispatch($this->dependencyInjection()->commandBus());

        $this->dependencyInjection()->logger()->info(
            'Order completed',
            ['order_id' => $this->id]
        );
    }
}
```

## Best Practices

1. **Separate Commands and Queries**: Commands should modify state, queries should only read data
2. **Use Async for Commands**: Commands can be processed asynchronously for better performance
3. **Use Sync for Queries**: Queries need immediate results, so process them synchronously
4. **Keep Handlers Simple**: Each handler should have a single responsibility
5. **Use Type Hints**: Always use proper type hints for better IDE support and error detection
6. **Log Important Actions**: Use the injected logger to track important domain events
