# ADR 0010: Events

## Status
Accepted

## Context
In our project, entities or any other objects need to communicate with each other without knowing each other. We need a way to decouple the objects and allow them to communicate in a loosely coupled manner.

## Decision
First, we need to have a way to represent an event. We will create an `Event` class to represent an event.

Second, events need to be stored in a collection. We will create an `EventCollection` class to represent a collection of events.
We also need a way to define the allowed events for an object. We will create an `AllowedEventsTypesCollection`.

Third, when adding an event to an object, we need to check if the object has events that can be dispatched. We will create an `HasEventsInterface` to define methods for adding, getting events, and removing events.
We will create an `EventsTrait` to add events to an object and helping with the implementation of the `HasEventsInterface`.

Fourth, we need a way to dispatch events. We will create an `EntityEventDispatcherInterface` to define methods for dispatching events.
Then, we will create an `EntityEventDispatcher` to dispatch events.

### Implementation Details
1. **Event**
    - `Event` to represent an event.
    - Must have a `propagationStopped` property.
2. **EventCollection**
    - `EventCollection` to represent a collection of events.
    - Must have a method to filter events by type.
3. **AllowedEventsTypesCollection**
    - `AllowedEventsTypesCollection` to define the allowed events for an object (class name).
4. **HasEventsInterface**
    - `HasEventsInterface` to define methods for adding, getting events, and removing events.
5. **EventsTrait**
    - `EventsTrait` to add events to an object and helping with the implementation of the `HasEventsInterface`.
6. **EntityEventDispatcherInterface**
    - `EntityEventDispatcherInterface` to define method for dispatching events.
    - Must use `ContextInterface`.
7. **EntityEventDispatcher**
    - `EntityEventDispatcher` to dispatch events.
    - Should add context to the event if it is not already set.

## Consequences

- **Benefits**: 
    - Objects can communicate with each other without knowing each other.
    - Objects are decoupled and can be easily tested.
    - Objects can be extended without modifying existing code.

- **Drawbacks**: 
    - Events can be misused and lead to complex interactions.
    - Events can make the code harder to understand.
