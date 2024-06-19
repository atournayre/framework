# ADR 0005: Log

## Status
Accepted

## Context
Logging is an essential part of any application. It helps developers track the application's behavior, identify issues, and troubleshoot problems. In our project, we need to implement a logging mechanism to record important events and messages.

## Decision
We have decided to create a `LoggerInterface` to provide methods for logging messages. The `LoggerInterface` will define methods for logging messages at different levels, such as `info`, `warning`, `error`, etc. Implementing classes can use these methods to log messages based on their severity.

Also, we will create a `LoggableInterface` to define method to log objects.

By default, there will be a `NullLogger` class that implements the `LoggerInterface` and does nothing.
The `DefaultLogger` class will implement the `LoggerInterface` and log messages to the console.
An `AbstractLogger` class will provide common functionality for logging classes.

### Implementation Details

1. **LoggerInterface**:
    - Provides methods for logging messages at different levels.
    - Requires implementing classes to provide methods for logging messages.
2. **LoggableInterface**: 
    - Provides method to log objects.
    - Requires implementing classes to provide methods for logging objects.
3. **NullLogger / DefaultLogger**:
    - Logs messages to the console.
    - Implements the `LoggerInterface`.
    - Extends the `AbstractLogger`.
    - Provides methods for logging messages at different levels.
4. **AbstractLogger**:
    - Provides common functionality for logging classes.
    - Implements the `LoggerInterface`.

## Consequences
- **Benefits**:
    - Provides a consistent and reusable approach to logging messages.
    - Centralizes logging logic, reducing code duplication and potential errors.
    - Enhances code readability and maintainability.
    - Allows developers to easily switch between different logging implementations.
    - Facilitates testing by providing a `NullLogger` implementation for testing environments.

- **Drawbacks**:
    - Introduces additional complexity with the need to create and manage the `LoggerInterface` and related classes.
    - Requires developers to be familiar with the logging interfaces and classes.
    - May require additional configuration for custom logging implementations.
    - Performance overhead associated with logging, especially in high-frequency logging scenarios.
    - Potential issues with logging in multi-threaded or distributed environments.
