# Event Component

This guide provides documentation for the Event component in the Framework. This component provides a base class for creating events that can be dispatched using Symfony's Messenger component.

## Event Class

The `Event` class is a base class for creating events that implements several interfaces:

```php
<?php

use Atournayre\Common\VO\Event;
use Symfony\Component\Messenger\MessageBusInterface;

// Create a new Event instance
$event = new Event();

// Dispatch the event using a MessageBus
$event->dispatch($messageBus); // $messageBus is an instance of MessageBusInterface
```

## Interfaces Implemented

The `Event` class implements the following interfaces:

- `StoppableEventInterface`: Allows controlling event propagation
- `HasContextInterface`: Provides context capabilities
- `LoggableInterface`: Enables logging functionality

## Event Propagation Control

The `Event` class implements the `StoppableEventInterface` which allows controlling event propagation:

```php
<?php

use Atournayre\Common\VO\Event;

// Create a new Event instance
$event = new Event();

// Check if propagation is stopped (default is false)
$isStopped = $event->isPropagationStopped(); // Returns false

// Stop event propagation
$event->stopPropagation();

// Check if propagation is stopped
$isStopped = $event->isPropagationStopped(); // Returns true
```

## Event Dispatch

The `Event` class provides a `dispatch` method that allows the event to dispatch itself using Symfony's Messenger component:

```php
<?php

use Atournayre\Common\VO\Event;
use Symfony\Component\Messenger\MessageBusInterface;

// Create a new Event instance
$event = new Event();

// Get a MessageBus instance (typically through dependency injection)
$messageBus = /* ... */;

// Dispatch the event
$event->dispatch($messageBus);
```

This method simplifies the process of dispatching events by allowing the event to dispatch itself, rather than requiring the caller to use the MessageBus directly.

## Logging Capabilities

The `Event` class implements the `LoggableInterface` which provides logging capabilities:

```php
<?php

use Atournayre\Common\VO\Event;

// Create a new Event instance
$event = new Event();

// Get log data
$logData = $event->toLog(); // Returns an array with event data for logging
```

The `toLog` method returns an array containing the event's identifier, type, and context (if available), which can be used for logging purposes.
