# ADR 0013: Collection

## Status
Accepted

## Context
Collections are used to store and manipulate a group of objects. They provide a consistent interface to interact with the group of objects. Collections can also be used to add additional functionality to the group of objects.

## Decision
We need to refactor the collection using composition.

We will create 2 interfaces `ListInterface` and `MapInterface` to provide the functionality to interact with the group of objects as a list and map respectively.

We will also create 2 additional interfaces `NumericListInterface` and `NumericMapInterface` to provide the functionality to interact with the group of objects as a numeric list and map respectively.

Then we need to create a class `Collection` that will represent a collection of objects. This class will wrap the `Aimeos\Map` class.

Finally, we will create 3 traits `CollectionCommonTrait`, `CollectionTrait`, and `NumericCollectionTrait` to provide the basic functionality to interact with the group of objects.

### Implementation Details

1. **ListInterface**:
    - `ListInterface` to provide the functionality to interact with the group of objects as a list.
2. **MapInterface**:
    - `MapInterface` to provide the functionality to interact with the group of objects as a map.
3. **NumericListInterface**:
    - `NumericListInterface` to provide the functionality to interact with the group of objects as a numeric list.
4. **NumericMapInterface**:
    - `NumericMapInterface` to provide the functionality to interact with the group of objects as a numeric map.
5. **Collection**:
    - `Collection` to represent a collection of objects.
    - Wraps the `Aimeos\Map` class.
6. **CollectionCommonTrait**:
    - `CollectionCommonTrait` to provide the basic functionality to interact with the group of objects.
7. **CollectionTrait**:
    - `CollectionTrait` to provide the basic functionality to create a collection of objects.
8. **NumericCollectionTrait**:
    - `NumericCollectionTrait` to provide the basic functionality to create a collection of numeric objects.

## Consequences

- **Benefits**:
    - Provides a consistent interface to interact with the group of objects.
    - Adds additional functionality to the group of objects.
    - Makes the code more readable and maintainable.

- **Drawbacks**: 
    - Adds an additional layer of abstraction.
    - Increases the complexity of the code.
