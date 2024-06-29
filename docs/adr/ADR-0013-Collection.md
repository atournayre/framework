# ADR 0013: Collection

## Status
Accepted

## Context
Collections are used to store and manipulate a group of objects. They provide a consistent interface to interact with the group of objects. Collections can also be used to add additional functionality to the group of objects.

## Decision
We need to refactor the collection using composition.

`Map` wrapper will be renamed to `Collection` and will be used to represent a collection of objects. It will provide a consistent interface to interact with the group of objects. It will also add additional functionality to the group of objects.

We will create interfaces `CollectionInterface`, `ListInterface` and `MapInterface`. The `CollectionInterface` will provide the basic functionality to interact with the group of objects. The `ListInterface` will provide the functionality to interact with the group of objects as a list. The `MapInterface` will provide the functionality to interact with the group of objects as a map.

We will create a `CollectionTrait` that will be used to implement the `Collection` interface. The `CollectionTrait` will provide the basic functionality to interact with the group of objects.

### Implementation Details
1. **Collection**:
    - `Collection` to represent a collection of objects.
    - Must implement the `CollectionInterface`.
2. **CollectionInterface**:
    - `CollectionInterface` to provide the basic functionality to interact with the group of objects.
3. **ListInterface**:
    - `ListInterface` to provide the functionality to interact with the group of objects as a list.
4. **MapInterface**:
    - `MapInterface` to provide the functionality to interact with the group of objects as a map.
5. **CollectionTrait**:
    - `CollectionTrait` to provide the basic functionality to interact with the group of objects.
    - Must implement the `CollectionInterface`.

## Consequences

- **Benefits**:
    - Provides a consistent interface to interact with the group of objects.
    - Adds additional functionality to the group of objects.
    - Makes the code more readable and maintainable.
- 
- **Drawbacks**: 
    - Adds an additional layer of abstraction.
    - Increases the complexity of the code.
