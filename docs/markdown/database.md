# Database Components

This guide provides documentation for the Database components in the Framework. These components provide a simple wrapper around Doctrine's EntityManager to manage database operations.

## Database Class

The `Database` class is a wrapper around Doctrine's EntityManager that implements the `DatabasePersistenceInterface`:

```php
<?php

use Atournayre\Common\Persistance\Database;
use Doctrine\ORM\EntityManagerInterface;

// Create a new Database instance
$database = Database::new(
    entityManager: $entityManager, // Instance of EntityManagerInterface
    object: $entity,               // The entity to be managed
);

// Persist the entity and flush changes in one chain
$database->persist()->flush();

// Update an entity (only needs flush)
// ... update entity properties ...
$database->flush();

// Remove the entity and flush changes in one chain
$database->remove()->flush();
```

## DatabaseEntityInterface

The `DatabaseEntityInterface` defines the contract for entities that can be persisted to a database:

```php
<?php

use Atournayre\Contracts\Persistance\DatabaseEntityInterface;
use Atournayre\Contracts\Persistance\DatabasePersistenceInterface;

// Interface methods
public function database(): DatabasePersistenceInterface; // Get a database persistence interface for this entity
```

Entities that implement this interface can be persisted to the database using the Database component.

## DatabaseTrait

The `DatabaseTrait` provides a convenient way to access the Database functionality in your entity or repository classes. Classes using this trait should implement the `DatabaseEntityInterface`:

```php
<?php

use Atournayre\Common\Persistance\DatabaseTrait;
use Atournayre\Contracts\Persistance\DatabaseEntityInterface;
use Atournayre\Contracts\Persistance\DatabasePersistenceInterface;

class MyEntity implements DatabaseEntityInterface
{
    use DatabaseTrait;

    private $dependencyInjection;

    public function __construct($dependencyInjection)
    {
        $this->dependencyInjection = $dependencyInjection;
    }

    public function save(): void
    {
        // Get a Database instance for this entity and use fluent interface
        $this->database()->persist()->flush();
    }

    public function delete(): void
    {
        // Get a Database instance for this entity and use fluent interface
        $this->database()->remove()->flush();
    }
}
```

## Direct Method Chaining

The recommended way to use the Database functionality is through direct method chaining:

```php
<?php

// Create and persist an entity (MyEntity implements DatabaseEntityInterface)
$entity = new MyEntity();
$entity->setName('Example');

// Persist and flush directly from the entity using fluent interface
$entity->database()->persist()->flush();

// Update an entity
$entity->setName('Updated Example');
$entity->database()->flush();

// Remove an entity using fluent interface
$entity->database()->remove()->flush();
```

This approach provides a cleaner and more intuitive developer experience, allowing you to work directly with your entities without creating separate database instances.

## DatabasePersistenceInterface

The `DatabasePersistenceInterface` defines the contract for database persistence operations:

```php
<?php

use Atournayre\Contracts\Persistance\DatabasePersistenceInterface;

// Interface methods
public function persist(): self; // Persist the object to the database and return self for method chaining
public function flush(): void;   // Execute SQL statements to persist changes
public function remove(): self;  // Remove the object from the database and return self for method chaining
```

The `Database` class provides an implementation of this interface, making it easy to manage database operations in your application.

For more detailed information about the Database components, see the [Database documentation](../doc/database.md).
