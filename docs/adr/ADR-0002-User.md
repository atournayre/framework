# ADR 0003: User

## Status
Accepted

## Context
User is a common entity in many applications. It often has attributes like name, email, and role. In our project, we need to handle nullable values for these attributes.

## Decision
We have decided to create a `UserInterface` to provide methods for setting and getting user attributes.
`UserInterface` is based on the `Symfony\Component\Security\Core\User\UserInterface`.
It also extends the `NullableInterface` to handle nullable values consistently.

### Implementation Details

1. **UserInterface**:
    - Provides methods for setting and getting user attributes.
    - Extends the `NullableInterface` to handle nullable values consistently.
    - Requires implementing classes to provide methods for handling user attributes.

## Consequences
- **Benefits**:
    - Provides a consistent and reusable approach to handling user attributes.
    - Centralizes nullable logic for user attributes, reducing code duplication and potential errors.
    - Enhances code readability and maintainability.

- **Drawbacks**:
    - Introduces additional complexity with the need to create and manage the `UserInterface`.
    - Requires developers to be familiar with the `NullableInterface`.
