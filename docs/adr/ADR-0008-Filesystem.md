# ADR 0008: Filesystem

## Status
Accepted

## Context
In our project, we need to handle filesystem operations, such as reading and writing files, creating directories, and managing file permissions.

## Decision
We have decided to create interfaces to decouple the filesystem logic from the rest of the application.

We will create the following interface and class to implement the interface for Symfony:
- `FilesystemInterface` to define methods for handling filesystem operations.
- `Filesystem` to implement the `Filesystem` for Symfony.

We also need to create a type to represent a file and a directory:
- `DirectoryOrFile` to represent a file.

### Implementation Details
1. **FilesystemInterface**:
    - Provides methods for handling filesystem operations.
    - Requires implementing classes to provide methods for reading and writing files, creating directories, and managing file permissions.
2. **Filesystem**:
    - Implements the `FilesystemInterface` for Symfony.
    - Provides methods for reading and writing files, creating directories, and managing file permissions in Symfony applications.
3. **DirectoryOrFile**:
    - Represents the path of a file or a directory.
    - Uses the `StringType`.

## Consequences

- **Benefits**:
    - Decouples filesystem logic from the rest of the application.
    - Provides a consistent and reusable approach to handling filesystem operations.
    - Enhances code readability and maintainability by separating concerns.
    - Facilitates testing by providing interfaces for mocking filesystem behavior.
    - Provides a type to represent a file or a directory.
    - Uses the `StringType` to represent the path of a file or a directory.

- **Drawbacks**:
    - Requires additional classes and interfaces to implement filesystem operations.
    - May introduce complexity in managing filesystem operations.
    - May require additional testing to ensure the correctness of filesystem operations.

