# ADR 0020: Duration

## Status
Accepted

## Context
We need to represent a duration.

## Decision
We will create a `Duration` class to represent a duration.

### Implementation Details

1. **Duration**:
    - `Duration` to represent a duration.

## Consequences

- **Benefits**:
    - Provides a consistent interface to represent a duration.
    - Provides methods to manipulate durations.
    - Facilitates testing by providing a `Duration` class.

- **Drawbacks**:
    - Introduces additional complexity with the need to create and manage the `Duration` class.
    - Requires developers to be familiar with the `Duration` class.
