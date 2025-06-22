# Development Guidelines

This document provides guidelines and instructions for developing and contributing to this project.

## Build/Configuration Instructions

### Prerequisites

- PHP 8.2.22 or higher
- Composer

### Setup

1. Clone the repository
2. Install dependencies:
   ```bash
   make vendor
   ```
   or
   ```bash
   composer install --prefer-dist --no-progress --no-scripts --no-interaction
   ```

## Testing Information

### Running Tests

The project uses PHPUnit for testing. To run all tests:

```bash
make tests
```

or directly:

```bash
php vendor/bin/phpunit
```

### Adding New Tests

1. Create a new test class in the appropriate directory under `tests/Unit/`
2. The test class should:
   - Extend `PHPUnit\Framework\TestCase`
   - Be in the same namespace structure as the code it tests (e.g., `Atournayre\Tests\Unit\Null` for testing `Atournayre\Null`)
   - Have descriptive test method names prefixed with `test`
   - Use assertions with `self::assert*` methods

### Example Test

Here's a simple test for the `NullEnum` class:

```php
<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Null;

use Atournayre\Null\NullEnum;
use PHPUnit\Framework\TestCase;

final class NullEnumTest extends TestCase
{
    public function testYes(): void
    {
        $nullEnum = NullEnum::yes();
        
        self::assertTrue($nullEnum->isNull());
        self::assertFalse($nullEnum->isNotNull());
        self::assertSame('yes', $nullEnum->value());
    }
    
    // Additional test methods...
}
```

## Code Quality Tools

The project uses several code quality tools that can be run individually or together:

### All Quality Checks

```bash
make qa
```

### PHP-CS-Fixer (Code Style)

```bash
make fix
```

### PHPStan (Static Analysis)

```bash
make phpstan
```

To update the PHPStan baseline:

```bash
make phpstan-update-baseline
```

### Rector (Automated Refactoring)

```bash
make rector
```

With cache clearing:

```bash
make rector-no-cache
```

### Swiss Knife (Additional Quality Checks)

```bash
make quality
```

## Development Workflow

1. Make your changes
2. Run tests: `make tests`
3. Run code quality tools: `make qa`
4. Fix any issues
5. Submit your changes

## Composer Commands

You can run Composer commands using the Makefile:

```bash
make composer c='require some/package'
```

## Project Structure

- `src/`: Source code
  - Organized by component (Common, Component, Contracts, etc.)
- `tests/`: Test code
  - `Unit/`: Unit tests (mirrors the structure of `src/`)
  - `Fixtures/`: Test fixtures
- `tools/`: Configuration for code quality tools
  - `phpstan/`: PHPStan configuration
  - `phpcsfixer/`: PHP-CS-Fixer configuration
