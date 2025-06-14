# Database

The Database class provides a simple wrapper around Doctrine's EntityManager to manage database operations.

## Entity Interface

Entities that need to be persisted to the database should implement the `DatabaseEntityInterface`:

```php
use Atournayre\Contracts\Persistance\DatabaseEntityInterface;

class MyEntity implements DatabaseEntityInterface
{
    // ...

    public function database(): DatabasePersistenceInterface
    {
        // Implementation provided by DatabaseTrait
    }
}
```

This interface ensures that entities provide a `database()` method that returns a `DatabasePersistenceInterface` instance for database operations.

## Usage

### Creating a Database Instance

```php
use Atournayre\Common\Persistance\Database;
use Doctrine\ORM\EntityManagerInterface;

// Create a new Database instance
$database = Database::new(
    entityManager: $entityManager, // Instance of EntityManagerInterface
    object: $entity,               // The entity to be managed
);
```

### Using the DatabaseTrait

For convenience, you can use the `DatabaseTrait` in your entity or repository classes. Classes using this trait should implement the `DatabaseEntityInterface`:

```php
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
        $database = $this->database();
        $database->persist();
        $database->flush();
    }
}
```

### Direct Method Chaining

The recommended way to use the Database functionality is through direct method chaining:

```php
// Create and persist an entity (MyEntity implements DatabaseEntityInterface)
$entity = new MyEntity();
$entity->setName('Example');

// Using fluent interface
$entity->database()->persist()->flush();

// Update an entity
$entity->setName('Updated Example');
$entity->database()->flush();

// Remove an entity
$entity->database()->remove()->flush();
```

This approach provides a cleaner and more intuitive developer experience.

## Available Methods

- `new(EntityManagerInterface $entityManager, object $object): Database` - Creates a new Database instance
- `persist(): self` - Persists the object to the database (prepares it for insertion/update) and returns self for method chaining
- `flush(): void` - Executes all SQL statements to persist the changes to the database
- `remove(): self` - Removes the object from the database (the actual DELETE statement will be executed when flush() is called) and returns self for method chaining

## Implementation Details

The Database class implements the `DatabasePersistenceInterface` which defines the contract for database persistence operations.

### Persistence Flow

1. Call `persist()` to tell Doctrine to "manage" the object
2. Call `flush()` to execute the SQL statements
3. Call `remove()` to mark an object for deletion (requires a subsequent `flush()` call)

### Example: Complete CRUD Operations

Using direct instantiation:

```php
// Create (MyEntity implements DatabaseEntityInterface)
$entity = new MyEntity();
$entity->setName('Example');

$database = Database::new($entityManager, $entity);
$database->persist()->flush();

// Update
$entity->setName('Updated Example');
$database->flush();

// Delete
$database->remove()->flush();
```

Using the recommended method chaining approach:

```php
// Create (MyEntity implements DatabaseEntityInterface)
$entity = new MyEntity();
$entity->setName('Example');

$entity->database()->persist()->flush();

// Update
$entity->setName('Updated Example');
$entity->database()->flush();

// Delete
$entity->database()->remove()->flush();
```
