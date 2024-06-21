# Documentation

This is the documentation for the project.

## Architecture Decision Records
Architecture Decision Records (ADRs) are a way to document the architectural decisions made during the development of the project. List of ADRs can be found [here](architecture-decision-records.md).

## Primitives
Primitives are the basic building blocks of the project. They are the smallest units of the project that can be used to build more complex structures. List of primitives can be found [here](doc/primitives.md).

## Handling nullable values using the Null Object Pattern
In this project, we use the Null Object Pattern to handle nullable values. You can read more about it [here](doc/null-object-pattern.md).

## DateTimeInterface
Use the `Atournayre\Contracts\DateTimeInterface` instead of the `\DateTimeInterface` class to represent dates and times.

## Logging
Use the `Atournayre\Contracts\LoggerInterface` to log messages in the project.

## Collections
Usage or arrays is discouraged in the project. Use Collections instead. You can read more about it [here](doc/collections.md).

## HTTP/Session/Templating
Use the `Atournayre\Contracts\HttpInterface`, `Atournayre\Contracts\SessionInterface`, and `Atournayre\Contracts\TemplatingInterface` to interact with the HTTP protocol, manage sessions, and render templates.

## Filesystem
Use the `Atournayre\Contracts\FilesystemInterface` to interact with the filesystem.
