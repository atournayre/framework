# ADR 0015: Interger type

## Status
Accepted

## Context
The `Integer` class is used to represent an integer. It provides methods to manipulate the integer.

## Decision

We need to create a new `Int_` class to represent an integer.

### Implementation Details

Methods exposed by `Int_` will be available in the `Integer` class.

## Consequences

- **Benefits**:
    - Provides a consistent interface to interact with the integer.
    - Adds additional functionality to the integer.
    - Makes the code more readable and maintainable.

- **Drawbacks**:
    - Adds an additional layer of abstraction.
    - Increases the complexity of the code.
