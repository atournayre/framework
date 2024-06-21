# ADR 0008: Collection

## Status
Accepted

## Context
In our project, we need to work with collections of data. Collections are used to store and manipulate groups of related items.

## Decision
We need different types of collections to handle different types of data. We will create the following collection classes:
- `AbstractCollection`: Provides common functionality for collections.
- `DateTimeCollection`: Handles collections of `DateTime` objects.
- `NumericCollection`: Handles collections of numerics.
- `TypedCollection`: Handles collections of objects of a specific type.
- `FileCollection`: Handles collections of files.

### Implementation Details

1. **AbstractCollection**:
    - Provides common functionality for collections.
    - Requires implementing classes to provide methods for adding, removing, and iterating over items.
2. **DateTimeCollection**:
    - Extends `AbstractCollection`.
    - Handles collections of `DateTime` objects.
    - Provides methods for adding, removing, and iterating over `DateTime` objects.
3. **NumericCollection**:
    - Extends `AbstractCollection`.
    - Handles collections of numerics.
    - Provides methods for adding, removing, and iterating over numerics.
4. **TypedCollection**:
    - Extends `AbstractCollection`.
    - Handles collections of objects of a specific type.
    - Provides methods for adding, removing, and iterating over objects of the specified type.
5. **FileCollection**:
    - Extends `AbstractCollection`.
    - Handles collections of files.
    - Provides methods for adding, removing, and iterating over files.
    - Uses Symfony's `SplFileInfo` class to represent files.

## Consequences
- **Benefits**:
    - Provides a consistent and reusable approach to working with collections.
    - Centralizes collection logic, reducing code duplication and potential errors.
    - Enhances code readability and maintainability.
    - Allows developers to easily work with different types of collections.
    - Facilitates testing by providing collection classes for testing environments.

- **Drawbacks**:
    - Introduces additional complexity with the need to create and manage multiple collection classes.
    - Requires developers to be familiar with the collection classes and their specific implementations.
    - May require additional configuration for custom collection implementations.
    - Potential issues with collections in multi-threaded or distributed environments.
