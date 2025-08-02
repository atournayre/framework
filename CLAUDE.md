# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a PHP framework library (`atournayre/framework`) that provides helpers and abstractions on top of Symfony. It's designed following Domain-Driven Design principles with strong type safety, immutability, and a focus on composition over inheritance.

## Development Commands

### Testing
```bash
# Run all tests
make tests
# or
php vendor/bin/phpunit

# Run tests with coverage
php vendor/bin/phpunit --coverage-html build/coverage
```

### Code Quality
```bash
# Run all quality checks
make qa

# Run PHPStan (static analysis)
make phpstan
# or
php vendor/bin/phpstan analyse --configuration=tools/phpstan/phpstan.neon --memory-limit=4G

# Update PHPStan baseline
make phpstan-update-baseline

# Run Rector (automated refactoring)
make rector
# or
php vendor/bin/rector process src --config=tools/rector.php

# Run PHP-CS-Fixer (code formatting)
make fix
# or
php vendor/bin/php-cs-fixer fix --config=tools/phpcsfixer/php-cs-fixer.php

# Run Swiss Knife (various code quality checks)
make quality
```

### Dependencies
```bash
# Install dependencies
make vendor
# or
composer install --prefer-dist --no-progress --no-scripts --no-interaction
```

## Core Architecture

### Framework Philosophy
- **Type Safety**: Extensive use of PHPStan templates and generics
- **Immutability First**: Prefer immutable objects with `with*()` methods
- **Trait-Based Composition**: Features assembled through traits rather than inheritance
- **Interface Segregation**: Granular interfaces for specific behaviors
- **Domain-Driven Design**: Value objects and domain events as first-class citizens
- **Elegant Object Principles**: Follows strict object-oriented principles with private constructors, no getters/setters, immutable objects, and controlled instantiation

### Key Components

#### 1. Primitives System (`src/Primitives/`)
- **Collection**: Immutable collection class with 100+ methods via traits
- **Type Wrappers**: StringType, Int_, Numeric, DateTime, Ulid, Uuid with validation
- **Traits**: Located in `src/Primitives/Traits/` for feature composition

#### 2. Contracts (`src/Contracts/`)
- **Collection Interfaces**: 100+ granular interfaces in `src/Contracts/Collection/`
- **Command/Query Bus**: CommandBusInterface, QueryBusInterface, CommandInterface, QueryInterface
- **Common Interfaces**: Assert, Context, DateTime, Exception, Logging, Persistence, Security

#### 3. Common Utilities (`src/Common/`)
- **Assert System**: Custom assertion library wrapping Webmozart Assert
- **Exception Hierarchy**: Custom exceptions with fluent interfaces
- **Value Objects**: Context, Duration, Event, Memory, Uri in `src/Common/VO/`
- **Types**: Domain-specific type wrappers in `src/Common/Types/`

#### 4. Dependency Injection (`src/DependencyInjection/`)
- **EntityDependencyInjection**: Lightweight service locator for CommandBus, QueryBus, Logger
- **DependencyInjectionTrait**: Provides both immutable (`withDependencyInjection()`) and mutable (`setDependencyInjection()`) methods
- **Immutable Pattern**: Prefer `withDependencyInjection()` for new objects

#### 5. Command/Query Bus (`src/Symfony/CommandBus/`)
- **Adapter Pattern**: Bridges framework interfaces to Symfony Messenger
- **CQRS Support**: Separate command and query buses
- **Self-Dispatching**: Commands and queries can dispatch themselves via `command()` and `query()` methods

#### 6. TryCatch System (`src/TryCatch/`)
- **Fluent Interface**: `TryCatch::with()->catch()->finally()->execute()`
- **Handler Collection**: Multiple exception handlers with priority
- **Generic Support**: PHPStan template support for type safety

#### 7. Event System
- **Domain Events**: New system using `AbstractCommandEvent` and `AbstractQueryEvent`
- **Legacy Events**: `src/Common/VO/Event.php` (deprecated)
- **Self-Dispatching**: Events can dispatch themselves through message buses

### Symfony Integration
The framework provides adapters for Symfony components:
- **Filesystem**: `src/Symfony/Filesystem/`
- **Mailer**: `src/Symfony/Mailer/`
- **Response**: `src/Symfony/Response/`
- **Routing**: `src/Symfony/Routing/`
- **Session**: `src/Symfony/Session/`
- **Templating**: `src/Symfony/Templating/`

## Development Patterns

### Object Instantiation (Elegant Object Pattern)
```php
// Constructors are private by default - use static factory methods
final class User
{
    private function __construct(
        private readonly string $name,
        private readonly string $email
    ) {}
    
    public static function new(string $name, string $email): self
    {
        return new self(name: $name, email: $email);
    }
    
    public static function fromArray(array $data): self
    {
        return new self(name: $data['name'], email: $data['email']);
    }
    
    // No getters - use meaningful methods instead
    public function name(): string
    {
        return $this->name;
    }
    
    public function email(): string
    {
        return $this->email;
    }
}

// Usage with named parameters
$user = User::new(name: 'John Doe', email: 'john@example.com');
```

### Working with Collections
```php
// Prefer immutable collections with named parameters
$collection = Collection::from(items: [1, 2, 3])
    ->filter(callback: fn($x) => $x > 1)
    ->map(callback: fn($x) => $x * 2)
    ->asReadOnly();

// Use granular interfaces for type hints (max 5 methods per interface)
function process(FilterInterface&MapInterface $collection): void
```

### Dependency Injection
```php
// Prefer immutable pattern with named parameters
$entity = $entity->withDependencyInjection(dependencyInjection: $di);

// Use mutable pattern only when necessary (e.g., Doctrine PostLoad)
$entity->setDependencyInjection(dependencyInjection: $di);
```

### Domain Events
```php
// Use new domain event system with private constructor
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

// Self-dispatch events with named parameters
$event = UserCreatedEvent::new(user: $user);
$event->command(); // Dispatches via command bus
```

### Exception Handling
```php
// Use TryCatch for complex exception handling with named parameters
TryCatch::with(callable: fn() => $this->riskyOperation())
    ->catch(
        throwableClass: ValidationException::class, 
        handler: fn($e) => $this->handleValidation($e)
    )
    ->catch(
        throwableClass: PersistenceException::class, 
        handler: fn($e) => $this->handlePersistence($e)
    )
    ->finally(callable: fn() => $this->cleanup())
    ->execute();
```

## Elegant Object Rules

The framework enforces strict Elegant Object principles via PHPStan:

### Core Rules
- **Private Constructors**: All constructors are private, use static factory methods (`new()`, `from()`, `create()`)
- **No Getters/Setters**: Use meaningful method names instead of `get*()` or `set*()`
- **Immutable Objects**: Properties are readonly, mutations return new instances
- **Final Classes**: Classes are either final or abstract
- **Private Properties**: All properties must be private
- **No Null Arguments**: Methods should never accept null parameters
- **Max 5 Public Methods**: Classes should expose few public methods
- **Max 5 Interface Methods**: Keep interfaces focused and small
- **No Static Methods**: Avoid static methods except for factory methods and specific cases
- **Code-Free Constructors**: Constructors should only assign properties

### Allowed Factory Method Prefixes
- `new()` - Primary constructor
- `from()`, `fromArray()` - Create from existing data
- `create()` - Alternative constructor
- `with()` - Immutable modifications
- `asList()`, `asMap()`, `asReadOnly()` - Collection transformations

## Configuration Files

- **PHPStan**: `tools/phpstan/phpstan.neon`
- **Rector**: `tools/rector.php`
- **PHP-CS-Fixer**: `tools/phpcsfixer/php-cs-fixer.php`
- **PHPUnit**: `phpunit.xml`
- **Composer**: `composer.json`

## Code Quality Standards

- **PHP Version**: 8.2+
- **PHPStan Level**: 6
- **Strict Types**: Required (`declare(strict_types=1);`)
- **Memory Limit**: 4GB for PHPStan analysis
- **Test Coverage**: Configured in PHPUnit

## Specialized Elegant Object Agents

### Elegant Object Auditor
Specialized agent for auditing, validating and improving code according to Yegor256's Elegant Object principles, complementing existing PHPStan rules. 

**Agent Definition**: `.claude/agents/elegant-object-auditor.md`

#### Usage via Task Tool
```
Task(
  subagent_type: "elegant-object-auditor", 
  description: "Elegant Object audit",
  prompt: "Audit src/Common/VO/User.php according to Yegor256's Elegant Object principles"
)
```

#### Key Features
- ✅ Verifies all existing PHPStan rules compliance
- 🔍 Adds Yegor256-specific rules (attribute count, method naming, CQRS)
- 📊 Generates actionable compliance reports  
- 🔧 Provides concrete refactoring suggestions
- 🎯 Integrates with existing quality pipeline

### Elegant Object Refactor
Specialized agent for refactoring PHP code to Elegant Object principles while minimizing breaking changes. Prioritizes backward compatibility and gradual migration strategies.

**Agent Definition**: `.claude/agents/elegant-object-refactor.md`

#### Usage via Task Tool
```
Task(
  subagent_type: "elegant-object-refactor", 
  description: "Conservative EO refactoring",
  prompt: "Refactor src/Common/Assert/Assert.php to Elegant Object principles with minimal breaking changes"
)
```

#### Key Features
- 🔄 Conservative refactoring approach (minimizes breaking changes)
- 📋 Phase-based migration strategy (internal → new methods → deprecation → breaking)
- 🛡️ Backward compatibility preservation
- 📚 Automatic migration documentation
- ⚙️ Integration with Rector for unavoidable changes

### Rector Agent
Specialized agent for creating and managing Rector migration rules for automated code transformations and framework upgrades.

**Agent Definition**: `.claude/agents/rector-agent.md`

#### Usage via Task Tool
```
Task(
  subagent_type: "rector-agent", 
  description: "Create migration rule",
  prompt: "Create Rector rule for migrating Assert::isArray() to Assert::new()->validate() in rector/sets/3.0.0.php for version 3.0.0"
)
```

#### Key Features
- 🔧 Custom Rector rule generation
- 📦 Version-based rule set organization
- 🧪 Comprehensive testing framework
- 🔄 Complex transformation handling
- 📖 Migration documentation automation

### Agent Integration Workflow

#### Complete Elegant Object Transformation
```bash
# 1. Audit current compliance
Task(subagent_type: "elegant-object-auditor", ...)

# 2. Plan conservative refactoring  
Task(subagent_type: "elegant-object-refactor", ...)

# 3. Create migration rules for breaking changes
Task(subagent_type: "rector-agent", ...)
```

#### Breaking Change Management
- **elegant-object-refactor**: Minimizes breaking changes, provides migration strategy
- **rector-agent**: Creates automated migration rules when breaking changes are unavoidable
- **Integration**: Seamless handoff between agents for complete migration pipeline