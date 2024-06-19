# ADR 0002: Handling Nullable Values Using the Null Object Pattern

## Status
Accepted

## Context
In our project, we frequently encounter the need to handle nullable values consistently. The goal is to avoid null checks scattered throughout the code, leading to cleaner and more maintainable code. The Null Object Pattern provides a way to encapsulate the absence of a value by using a special object that represents "null."

## Decision
We will implement the Null Object Pattern by creating a class `NullEnum` to represent the states of "null" and "not null." Additionally, we will use a trait `NullTrait` to add nullable handling capabilities to our classes. This approach will ensure that all nullable logic is centralized and reusable across the codebase.

### Implementation Details

1. **NullEnum Class**:
    - Represents the states `YES` and `NO`.
    - Provides methods to check if the state is `YES` (null) or `NO` (not null).
    - Includes a method to create an instance from a boolean value.

2. **NullTrait**:
    - Provides methods to handle nullable logic.
    - Includes methods to convert an object to a nullable state, check if an object is null or not null, and handle nullable operations.

3. **NullableInterface**:
    - Defines the contract for nullable objects.
    - Requires implementing classes to provide methods for handling nullable logic.

## Consequences
- **Benefits**:
    - Provides a consistent and reusable approach to handling nullable values.
    - Centralizes nullable logic, reducing code duplication and potential errors.
    - Enhances code readability and maintainability.

- **Drawbacks**:
    - Introduces additional complexity with the need to create and manage the `NullEnum` class and `NullTrait`.
    - Requires developers to be familiar with the Null Object Pattern.

## Notes
Future versions of PHP (8.1+) support native enums, which may allow for a simpler implementation of this pattern. For now, this approach ensures compatibility and maintains code consistency.
