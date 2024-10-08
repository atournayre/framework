# Collections

Collections are of 2 types:
- `List` where each object is identified by an index. 
- `Map` where each object is identified by a key.

## Create a typed collection

### Create a class that implements interface(s)
A collection can implement multiple interfaces based on the requirement.
Available interfaces are:
- `ListInterface` to represent a list of objects.
- `MapInterface` to represent a map of objects.
- `NumericListInterface` to represent a list of numeric objects.
- `NumericMapInterface` to represent a map of numeric objects.
- `CollectionValidationInterface` to validate a collection.

### Use a trait to provide basic functionality
A trait can be used to provide basic functionality to interact with the group of objects. It can be used to create a collection of objects.

Available traits are:
- `CollectionCommonTrait` to provide the basic functionality to interact with the group of objects.
- `CollectionTrait` to provide the basic functionality to create a collection of objects.
- `NumericCollectionTrait` to provide the basic functionality to create a collection of numeric objects.
- `StaticCollectionTrait` to provide the basic functionality to create a static collection of objects.
- `CollectionAsMapTrait` to provide the basic functionality to create a collection of objects as a map.
- `CollectionAsListTrait` to provide the basic functionality to create a collection of objects as a list.

### Assertions
Use assertions to validate the type of objects in the collection when creating named constructors.

## Built-in collections

- AllowedEventsTypesCollection
- DateTimeCollection
- EventCollection
- FileCollection
- TemplateContextCollection
- ValidationCollection

Each collection have specific methods to interact with the group of objects.
