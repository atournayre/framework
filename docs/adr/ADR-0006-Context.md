# ADR 0006: Context

## Status
Accepted

## Context
In our project, we need to consider the context. The context contains information about the current user and the current time.

## Decision
We have decided to create a `ContextInterface` to provide methods for accessing the current user and the current time. The `ContextInterface` will define methods for getting the current user and the current time.

Also, we will create a `Context` class that implements the `ContextInterface` and provides the current user and the current time.

We also need a `HasContextInterface` to define methods for accessing the context.

A `ContextTrait` will provide common functionality for classes that need to access the context.

And we will create a `ContextFactory` class to create a `Context` object.

A `SecurityInterface` will be needed to help the `ContextFactory` class to get the current user.

### Implementation Details

1. **ContextInterface**:
    - Provides methods for accessing the current user and the current time.
    - Requires implementing classes to provide methods for getting the current user and the current time.
2. **Context**:
    - Implements the `ContextInterface`.
    - Provides the current user and the current time.
3. **HasContextInterface**:
    - Provides methods for accessing the context.
    - Requires implementing classes to provide methods for accessing the context.
4. **ContextTrait**:
    - Provides common functionality for classes that need to access the context.
    - Requires implementing classes to use the `Context` object.
5. **ContextFactory**:
    - Creates a `Context` object.
6. **SecurityInterface**:
    - Provides methods for getting the current user.
    - Requires implementing classes to provide methods for getting the current user.

## Consequences
- **Benefits**:
    - Provides a consistent and reusable approach to accessing the context.
    - Centralizes context logic, reducing code duplication and potential errors.
    - Enhances code readability and maintainability.
    - Allows developers to easily access the current user and the current time.
    - Facilitates testing by providing a `Context` object for testing environments.

- **Drawbacks**:
    - Introduces additional complexity with the need to create and manage the `ContextInterface` and related classes.
    - Requires developers to be familiar with the context interfaces and classes.
    - May require additional configuration for custom context implementations.
    - Potential issues with context in multi-threaded or distributed environments.
