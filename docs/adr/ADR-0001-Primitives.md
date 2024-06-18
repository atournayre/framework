# ADR 0001: Primitives 

## Context
We need to have a consistent way to handle primitive types in our application. This library provides types for handling booleans, numerics, and strings. We need to decide on the implementation of these primitives to ensure compatibility and consistency across the application.

## Decision
We have decided to create a StringType, BooleanEnum, and Numeric to handle string, boolean, and numeric values respectively. These types will provide methods for type conversion, validation, and manipulation of the primitive values.

1. **StringType**:
    - Provides methods for string manipulation, validation, and conversion.
    - Ensures type safety and consistency for handling string values.
2. **BooleanEnum**:
    - Implements an enumeration for boolean values.
    - Ensures type safety and consistency for handling boolean values.
    - Provides methods for type conversion and validation.
3. **Numeric**:
    - Provides methods for numeric manipulation, validation, and conversion.
    - Ensures type safety and consistency for handling numeric values.
4. **Locale**:
    - Numerics can be locale-specific, so we need a way to handle locale values.
    - Provides methods for locale manipulation, validation, and conversion.
    - Ensures type safety and consistency for handling locale values.

## Consequences
- **Benefits**:
    - Ensures type safety and consistency for handling primitive values.
    - Provides standardized methods for type conversion, validation, and manipulation.
    - Enhances code readability and maintainability by using well-defined types.

- **Drawbacks**:
    - Requires all implementations to use the provided types for handling primitive values.
    - Introduces additional complexity for handling primitive values.

## Alternatives Considered
- Using native PHP types directly: This would simplify the implementation but may lead to inconsistencies and lack of type safety.
