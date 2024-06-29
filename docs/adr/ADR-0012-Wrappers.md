# ADR 0012: Wrappers

## Status
Accepted

## Context
Wrappers are used to encapsulate third-party libraries or APIs. They provide a consistent interface to interact with the third-party code. Wrappers can also be used to add additional functionality to the third-party code.

## Decision

`SplFileInfo` is a wrapper for the `SplFileInfo` class in Symfony. It provides a consistent interface to interact with the `SplFileInfo` class. It also adds additional functionality to the `SplFileInfo` class.

We need to create new types related to the `SplFileInfo` class : `Content`, `Filename`, `Extension`, `Path`.

`Map` is a wrapper for the Aimeos `Map` class. It provides a consistent interface to interact with the `Map` class.


### Implementation Details
1. **SplFileInfo**:
    - `SplFileInfo` to represent a file.
2. **Content**:
    - `Content` to represent the content of a file.
    - Must have a method to get the content of the file.
3. **Filename**:
    - `Filename` to represent the name of a file.
    - Must have a method to get the name of the file.
4. **Extension**:
    - `Extension` to represent the extension of a file.
    - Must have a method to get the extension of the file.
5. **Path**:
    - `Path` to represent the path of a file.
    - Must have a method to get the path of the file.
6. **Map**:
    - `Map` to represent a map.

## Consequences

- **Benefits**:
    - Provides a consistent interface to interact with the third-party code.
    - Adds additional functionality to the third-party code.
    - Makes the code more readable and maintainable.

- **Drawbacks**: 
    - Adds an additional layer of abstraction.
    - Increases the complexity of the code.
