# Symfony Components

This guide provides documentation for the Symfony components in the Framework. These components provide various utilities and functionalities for working with Symfony-related features.

## Filesystem

The `Filesystem` class provides utilities for working with files and directories:

```php
<?php

use Atournayre\Symfony\Filesystem\Filesystem;
use Atournayre\Common\Types\DirectoryOrFile;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;

// Create a Filesystem instance
$filesystem = new Filesystem(
    new DirectoryOrFile('/path/to/directory/or/file'),
    new Finder(),
    new SymfonyFilesystem()
);

// Or use the static factory method
$filesystem = Filesystem::from('/path/to/directory/or/file');

// Create a directory
$filesystem->createDirectory('/path/to/new/directory');

// Create a file with content
$filesystem->createFile('/path/to/file.txt', 'File content');

// Copy a file
$filesystem->copyFile('/path/to/source.txt', '/path/to/destination.txt');

// Copy a directory
$filesystem->copyDirectory('/path/to/source/directory', '/path/to/destination/directory');

// Move a file
$filesystem->moveFile('/path/to/source.txt', '/path/to/destination.txt');

// Move a directory
$filesystem->moveDirectory('/path/to/source/directory', '/path/to/destination/directory');

// Rename a file
$filesystem->renameFile('/path/to/old_name.txt', '/path/to/new_name.txt');

// Rename a directory
$filesystem->renameDirectory('/path/to/old_directory', '/path/to/new_directory');

// Check if a file or directory exists
$exists = $filesystem->exists()->isTrue();

// Check if it's a file
$isFile = $filesystem->isFile()->isTrue();

// Check if it's a directory
$isDirectory = $filesystem->isDirectory()->isTrue();

// Check if a directory is empty
$isEmpty = $filesystem->isEmpty()->isTrue();

// Check if a directory is not empty
$isNotEmpty = $filesystem->isNotEmpty()->isTrue();

// Count files in a directory
$fileCount = $filesystem->countFiles();

// List files in a directory
$files = $filesystem->listFiles();

// Count directories in a directory
$directoryCount = $filesystem->countDirectories();

// List directories in a directory
$directories = $filesystem->listDirectories();

// Check permissions
$isReadable = $filesystem->isReadable()->isTrue();
$isWritable = $filesystem->isWritable()->isTrue();
$isExecutable = $filesystem->isExecutable()->isTrue();
$isLink = $filesystem->isLink()->isTrue();
```

## Mailer

The Mailer component provides functionality for sending emails:

```php
<?php

use Atournayre\Symfony\Mailer\Mailer;

// Example usage of the Mailer component
// (Documentation to be expanded based on the actual implementation)
```

## Response

The Response component provides utilities for working with HTTP responses:

```php
<?php

use Atournayre\Symfony\Response\Response;

// Example usage of the Response component
// (Documentation to be expanded based on the actual implementation)
```

## Routing

The Routing component provides utilities for handling routes:

```php
<?php

use Atournayre\Symfony\Routing\Router;

// Example usage of the Routing component
// (Documentation to be expanded based on the actual implementation)
```

## Session

The Session component provides utilities for working with sessions:

```php
<?php

use Atournayre\Symfony\Session\Session;

// Example usage of the Session component
// (Documentation to be expanded based on the actual implementation)
```

## Templating

The Templating component provides utilities for working with templates:

```php
<?php

use Atournayre\Symfony\Templating\Templating;

// Example usage of the Templating component
// (Documentation to be expanded based on the actual implementation)
```

## VO (Value Objects)

The VO component provides value objects for Symfony components:

```php
<?php

use Atournayre\Symfony\VO\ValueObject;

// Example usage of the VO component
// (Documentation to be expanded based on the actual implementation)
```

## Contracts

The Contracts component provides interfaces for Symfony components:

```php
<?php

use Atournayre\Symfony\Contracts\SomeInterface;

// Example usage of the Contracts component
// (Documentation to be expanded based on the actual implementation)
```

## Middleware

### DoctrineTransactionMiddleware

The `DoctrineTransactionMiddleware` provides automatic transaction management for Symfony Messenger messages. It starts a transaction before handling a message, commits it after successful processing, and rolls back in case of exceptions.

#### Configuration

To use the `DoctrineTransactionMiddleware` in your Symfony application, you need to:

1. Create a service definition in your `services.yaml`:

```yaml
# config/services.yaml
services:
    Atournayre\Symfony\Middleware\DoctrineTransactionMiddleware:
        arguments:
            - '@doctrine.orm.entity_manager'
            - '@messenger.handlers_locator'
            - '@your_logger_service'
        tags: ['messenger.middleware']
```

2. Ensure your message handlers implement the `AllowFlushInterface` to enable transaction management:

```php
<?php

namespace App\MessageHandler;

use Atournayre\Contracts\Persistance\AllowFlushInterface;
use App\Message\YourMessage;

final class YourMessageHandler implements AllowFlushInterface
{
    public function __invoke(YourMessage $message)
    {
        // Your handler logic here
        // Changes to entities will be automatically committed or rolled back
    }
}
```

## Subscribers

### DoctrineTransactionSubscriber

The `DoctrineTransactionSubscriber` provides automatic transaction management for HTTP requests. It starts a transaction when a controller is called, commits it after a successful response, and rolls back in case of exceptions.

#### Configuration

To use the `DoctrineTransactionSubscriber` in your Symfony application, you need to:

1. Create a service definition in your `services.yaml`:

```yaml
# config/services.yaml
services:
    Atournayre\Symfony\Subscriber\DoctrineTransactionSubscriber:
        arguments:
            - '@doctrine.orm.entity_manager'
            - '@your_logger_service'
        tags: ['kernel.event_subscriber']
```

2. Ensure your controllers implement the `AllowFlushInterface` to enable transaction management:

```php
<?php

namespace App\Controller;

use Atournayre\Contracts\Persistance\AllowFlushInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class YourController extends AbstractController implements AllowFlushInterface
{
    public function yourAction(): Response
    {
        // Your controller logic here
        // Changes to entities will be automatically committed or rolled back

        return new Response('Success');
    }
}
```

### DoctrineCommandTransactionSubscriber

The `DoctrineCommandTransactionSubscriber` provides automatic transaction management for Symfony Console commands. It starts a transaction when a command is executed, commits it after successful execution, and rolls back in case of exceptions.

#### Configuration

To use the `DoctrineCommandTransactionSubscriber` in your Symfony application, you need to:

1. Create a service definition in your `services.yaml`:

```yaml
# config/services.yaml
services:
    Atournayre\Symfony\Subscriber\DoctrineCommandTransactionSubscriber:
        arguments:
            - '@doctrine.orm.entity_manager'
            - '@your_logger_service'
        tags: ['kernel.event_subscriber']
```

2. Ensure your commands implement the `AllowFlushInterface` to enable transaction management:

```php
<?php

namespace App\Command;

use Atournayre\Contracts\Persistance\AllowFlushInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class YourCommand extends Command implements AllowFlushInterface
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Your command logic here
        // Changes to entities will be automatically committed or rolled back

        return Command::SUCCESS;
    }
}
```
