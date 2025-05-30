# Null Components

This guide provides documentation for the Null components in the Framework. These components implement the Null Object Pattern, which allows you to represent null values as objects, making your code more robust and reducing the need for null checks.

## NullEnum

The `NullEnum` class provides a way to represent and work with null states:

```php
<?php

use Atournayre\Null\NullEnum;

// Create a NullEnum representing "yes" (null)
$nullEnum = NullEnum::yes();

// Create a NullEnum representing "no" (not null)
$nullEnum = NullEnum::no();

// Create a NullEnum from a boolean
$nullEnum = NullEnum::fromBool(true); // Equivalent to NullEnum::yes()
$nullEnum = NullEnum::fromBool(false); // Equivalent to NullEnum::no()

// Check if the enum represents null
$isNull = $nullEnum->isNull(); // true if the enum represents null

// Check if the enum represents not null
$isNotNull = $nullEnum->isNotNull(); // true if the enum represents not null

// Get the underlying value
$value = $nullEnum->value(); // Returns "yes" or "no"
```

## NullTrait

The `NullTrait` provides null-handling functionality that can be used in your classes:

```php
<?php

use Atournayre\Null\NullTrait;

class YourClass
{
    use NullTrait;

    public function __construct()
    {
        // The NullTrait will automatically initialize the null state
        // You can also explicitly initialize it:
        $this->initializeNull(false); // Initialize as not null
    }
}

// Create an instance
$object = new YourClass();

// Check if the object is null
$isNull = $object->isNull(); // false by default

// Check if the object is not null
$isNotNull = $object->isNotNull(); // true by default

// Create a nullable version of the object
$nullableObject = $object->toNullable();
$isNull = $nullableObject->isNull(); // true

// Create a null instance statically
$nullObject = YourClass::asNull();
$isNull = $nullObject->isNull(); // true

// Handle null with orNull
$result = $object->orNull(); // Returns $object if not null, otherwise returns a null instance

// Handle null with orThrow
try {
    $result = $object->orThrow(function() {
        return new \RuntimeException('Object is null');
    });
    // $result will be $object if not null
} catch (\RuntimeException $e) {
    // Exception will be thrown if $object is null
}

// You can also pass an exception instance directly
try {
    $result = $object->orThrow(new \RuntimeException('Object is null'));
    // $result will be $object if not null
} catch (\RuntimeException $e) {
    // Exception will be thrown if $object is null
}
```

## NullableInterface

The `NullableInterface` defines the contract for classes that implement the Null Object Pattern:

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

The `NullTrait` provides a default implementation of this interface, making it easy to add null-handling functionality to your classes.
