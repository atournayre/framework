# ADR 0004: DateTimeInterface

## Status
Accepted

## Context
DateTime is a common data type in many applications. It often represents a date and time value. In our project, we need to handle nullable values for DateTime attributes.
Also, we need to provide methods for setting and getting date and time values consistently.

## Decision
We have decided to create a `DateTimeInterface` to provide methods for setting and getting date and time values.
`DateTimeInterface` extends the `NullableInterface` to handle nullable values consistently.

### Implementation Details

1. **DateTime**:
    - Represents a date and time value.
    - Implements the `DateTimeInterface` to provide methods for setting and getting date and time values.
    - Implements the `NullableInterface` to handle nullable values consistently.
2. **DateTimeInterface**:
    - Provides methods for setting and getting date and time values.
    - Extends the `NullableInterface`.
    - Requires implementing classes to provide methods for handling date and time values.

## Consequences
- **Benefits**:
    - Provides a consistent and reusable approach to handling date and time values.
    - Centralizes nullable logic for date and time values, reducing code duplication and potential errors.
    - Enhances code readability and maintainability.

- **Drawbacks**:
    - Introduces additional complexity with the need to create and manage the `DateTimeInterface`.
    - Requires developers to be familiar with the `NullableInterface`.
