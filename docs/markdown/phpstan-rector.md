# PHPStan & Rector

Custom rules and extensions for static analysis and automated refactoring.

## PHPStan

PHPStan level 6 configuration with Elegant Objects rules.

### Configuration

Main configuration in `tools/phpstan/phpstan.neon`:

```yaml
parameters:
    phpVersion: 80200
    level: 6
    paths:
        - ../../src/
        - ../../tests/
```

### AssertTypeSpecifying Extension

PHPStan extension to support Webmozart `Assert`:

```php
use Atournayre\PHPStan\Extension\AssertTypeSpecifyingExtension;

// Extension informs PHPStan about types after assertions
Assert::notNull(value: $user);
// PHPStan now knows $user is not null

Assert::isInstanceOf(value: $entity, class: User::class);
// PHPStan now knows $entity is User
```

### Elegant Objects Rules

File `tools/phpstan/elegant-object.neon` with strict rules:

#### Private Constructors

```php
// ✅ Correct
final class User
{
    private function __construct(private readonly string $name) {}
    
    public static function new(string $name): self
    {
        return new self(name: $name);
    }
}

// ❌ PHPStan error: Constructor must be private
final class BadUser
{
    public function __construct(string $name) {}
}
```

#### No Getters/Setters

```php
// ✅ Correct
public function name(): string { return $this->name; }

// ❌ PHPStan error: Method name starts with get
public function getName(): string { return $this->name; }
```

#### Immutable Properties

```php
// ✅ Correct
private readonly string $name;

// ❌ PHPStan error: Property is mutable
private string $name;
```

#### Final Classes

```php
// ✅ Correct
final class User {}
abstract class BaseUser {}

// ❌ PHPStan error: Class must be final or abstract
class BadUser {}
```

#### Max 5 Public Methods

```php
// ✅ Correct - 4 public methods
final class User
{
    public function name(): string {}
    public function email(): string {}
    public function isActive(): bool {}
    public function activate(): void {}
}

// ❌ PHPStan error: Too many public methods (6+)
```

### Commands

```bash
# Full analysis
make phpstan
# or
php vendor/bin/phpstan analyse --configuration=tools/phpstan/phpstan.neon

# Update baseline
make phpstan-update-baseline

# With increased memory
php vendor/bin/phpstan analyse --memory-limit=4G
```

## Rector

Automated refactoring with custom rules.

### Configuration

Configuration in `tools/rector.php`:

```php
use Rector\Config\RectorConfig;
use Atournayre\Rector\Sets;

return RectorConfig::configure()
    ->withPaths([__DIR__ . '/../src'])
    ->withSets([
        Sets::VERSION_2_7_0,
        Sets::VERSION_2_8_0,
        Sets::VERSION_2_9_0,
    ]);
```

### Rule: ReplaceTraitUseByAliasName

Replaces trait usage by their alias:

```php
// Before
use Atournayre\Primitives\Traits\Collection as CollectionTrait;

// After automatic refactoring
use Atournayre\Primitives\Traits\Collection\CollectionTrait;
```

### Commands

```bash
# Dry run (see changes without applying)
make rector
# or
php vendor/bin/rector process src --dry-run

# Apply changes
php vendor/bin/rector process src
```

## CI/CD Integration

### GitHub Actions

```yaml
name: Static Analysis

on: [push, pull_request]

jobs:
  phpstan:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - uses: php-actions/composer@v6
      - name: PHPStan
        run: make phpstan

  rector:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - uses: php-actions/composer@v6
      - name: Rector (dry-run)
        run: make rector
```

## Development Workflow

### Before Commit

```bash
# Check compliance
make qa  # Runs PHPStan, Rector, PHP-CS-Fixer

# If PHPStan errors
make phpstan

# If refactoring needed
make rector  # Dry run
php vendor/bin/rector process src  # Apply
```

## Benefits

### PHPStan
- **Type safety**: Detect errors before runtime
- **Elegant Objects**: Respect design principles
- **Documentation**: Self-documented code through types
- **Prevention**: Bugs detected during development

### Rector
- **Automation**: Automated massive refactoring
- **Migration**: Simplified version upgrades
- **Consistency**: Uniform code across codebase
- **Productivity**: Time saved on manual refactoring

## Tests

```bash
# Verify PHPStan passes
make phpstan

# Verify Rector has nothing to do
make rector

# Complete quality check
make qa
```
