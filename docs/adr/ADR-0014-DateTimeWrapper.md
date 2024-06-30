# ADR 0014: DateTime Wrapper

## Status
Accepted

## Context
The `DateTime` class is used to represent a date and time. It provides methods to manipulate the date and time.

The `DateTime` class wraps the `Carbon` class. The `Carbon` class is a simple PHP API extension for DateTime.

## Decision

We need to refactor the `DateTime` class to wrap the `Carbon` class.

### Implementation Details

Methods exposed by Carbon will be available in the `DateTime` class.

## Consequences

- **Benefits**:
    - Provides a consistent interface to interact with the date and time.
    - Adds additional functionality to the date and time.
    - Makes the code more readable and maintainable.

- **Drawbacks**:
    - Adds an additional layer of abstraction.
    - Increases the complexity of the code.
