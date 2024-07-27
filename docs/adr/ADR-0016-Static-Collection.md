# ADR 0016: Static collection

## Status
Accepted

## Context
We need to be able to create a static collection of items.

## Decision

We will create a `StaticCollectionTrait` to override the `CollectionCommonTrait` and throw an exception when the collection is modified.

## Consequences

- **Benefits**:
    - We can create a static collection of items.

- **Drawbacks**:
    - We need to override the `CollectionCommonTrait` to throw an exception when the collection is modified.
