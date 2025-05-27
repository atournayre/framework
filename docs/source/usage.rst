Usage
=====

This guide provides examples of how to use the primitives and common components in the Framework.

Common Components
----------------

The Framework provides several common components that can be used across your application.

Assert Usage
~~~~~~~~~~~

The ``Assert`` class provides methods for making assertions about values, with methods for checking types, values, and other conditions:

.. code-block:: php

    <?php

    use Atournayre\Common\Assert\Assert;

    // Check if a value is of a specific type
    Assert::isType($value, 'string'); // Checks if $value is a string
    Assert::isType($value, 'int'); // Checks if $value is an integer
    Assert::isType($value, 'float'); // Checks if $value is a float
    Assert::isType($value, 'bool'); // Checks if $value is a boolean
    Assert::isType($value, 'array'); // Checks if $value is an array
    Assert::isType($value, 'object'); // Checks if $value is an object
    Assert::isType($value, 'null'); // Checks if $value is null

    // Check if an array is a list of a specific type
    Assert::isListOf($array, 'string'); // Checks if $array is a list of strings
    Assert::isListOf($array, 'int'); // Checks if $array is a list of integers
    Assert::isListOf($array, SomeClass::class); // Checks if $array is a list of SomeClass instances

    // Check if an array is a map of a specific type
    Assert::isMapOf($array, 'string'); // Checks if $array is a map with string values
    Assert::isMapOf($array, 'int'); // Checks if $array is a map with integer values
    Assert::isMapOf($array, SomeClass::class); // Checks if $array is a map with SomeClass instances

    // Other assertions
    Assert::string($value); // Checks if $value is a string
    Assert::integer($value); // Checks if $value is an integer
    Assert::float($value); // Checks if $value is a float
    Assert::boolean($value); // Checks if $value is a boolean
    Assert::notEmpty($value); // Checks if $value is not empty
    Assert::notNull($value); // Checks if $value is not null
    Assert::email($value); // Checks if $value is a valid email address
    Assert::ip($value); // Checks if $value is a valid IP address
    Assert::uuid($value); // Checks if $value is a valid UUID

The ``Assert`` class implements several interfaces from the ``Contracts`` directory:

- ``AssertInterface``: Basic assertion methods
- ``AssertStringInterface``: String-specific assertion methods
- ``AssertNumericInterface``: Numeric-specific assertion methods
- ``AssertMiscInterface``: Miscellaneous assertion methods
- ``AssertAllInterface``: Methods for asserting conditions on all elements of an array
- ``AssertIsInterface``: Methods for asserting what a value is
- ``AssertNotInterface``: Methods for asserting what a value is not
- ``AssertNullInterface``: Methods for asserting null or nullable values

Exception Usage
~~~~~~~~~~~~~

The Framework provides several exception classes that extend PHP's built-in exceptions:

.. code-block:: php

    <?php

    use Atournayre\Common\Exception\InvalidArgumentException;
    use Atournayre\Common\Exception\BadMethodCallException;
    use Atournayre\Common\Exception\NullException;
    use Atournayre\Common\Exception\RuntimeException;
    use Atournayre\Common\Exception\UnexpectedValueException;

    // Create and throw an exception
    InvalidArgumentException::new('Invalid argument')->throw();

    // Create an exception from another throwable
    $exception = InvalidArgumentException::fromThrowable($throwable);

    // Create an exception with a specific message
    $exception = RuntimeException::new('An error occurred');

    // Create an exception with a specific message and code
    $exception = UnexpectedValueException::new('Unexpected value', 400);

Logger Usage
~~~~~~~~~~~

The Framework provides several logger classes for logging messages:

.. code-block:: php

    <?php

    use Atournayre\Common\Log\DefaultLogger;
    use Atournayre\Common\Log\NullLogger;

    // Create a default logger
    $logger = new DefaultLogger();

    // Log messages
    $logger->emergency('Emergency message');
    $logger->alert('Alert message');
    $logger->critical('Critical message');
    $logger->error('Error message');
    $logger->warning('Warning message');
    $logger->notice('Notice message');
    $logger->info('Info message');
    $logger->debug('Debug message');

    // Create a null logger (doesn't log anything)
    $logger = new NullLogger();

The logger classes implement the ``LoggerInterface`` from the ``Contracts`` directory.

Collection Usage
~~~~~~~~~~~~~~

The Framework provides collection classes for working with collections of items:

.. code-block:: php

    <?php

    use Atournayre\Common\Collection\EventCollection;
    use Atournayre\Common\Collection\TemplateContextCollection;
    use Atournayre\Common\VO\Event;

    // Create an empty event collection
    $eventCollection = EventCollection::empty();

    // Create an event collection from an array
    $eventCollection = EventCollection::asMap([
        'event1' => new Event(/* ... */),
        'event2' => new Event(/* ... */),
    ]);

    // Add an event to the collection
    $eventCollection = $eventCollection->add(new Event(/* ... */));

    // Filter events by type
    $filteredEvents = $eventCollection->filterByType(SomeEventType::class);

    // Create a template context collection
    $contextCollection = TemplateContextCollection::asMap([
        'key1' => 'value1',
        'key2' => 'value2',
    ]);

    // Check if a key exists in the collection
    $hasKey = $contextCollection->has('key1');

The collection classes implement the ``MapInterface`` from the ``Contracts`` directory.

Model Usage
~~~~~~~~~

The Framework provides model classes for representing users:

.. code-block:: php

    <?php

    use Atournayre\Common\Model\DefaultUser;

    // Create a null user
    $nullUser = DefaultUser::asNull();

    // Check if the user is null
    $isNull = $nullUser->isNull();

The model classes implement the ``UserInterface`` from the ``Contracts`` directory.

Factory Usage
~~~~~~~~~~

The Framework provides factory classes for creating objects:

.. code-block:: php

    <?php

    use Atournayre\Common\Factory\Context\ContextFactory;
    use Atournayre\Contracts\Security\SecurityInterface;
    use Psr\Clock\ClockInterface;

    // Create a context factory
    $contextFactory = new ContextFactory(
        $security, // An implementation of SecurityInterface
        $clock     // An implementation of ClockInterface
    );

    // Create a context from a user
    $context = $contextFactory->fromUser($user);

    // Create a context from a date/time
    $context = $contextFactory->fromDateTime(new \DateTime());

    // Create a context from a user and a date/time
    $context = $contextFactory->create($user, new \DateTime());

Traits Usage
~~~~~~~~~~

The Framework provides several traits that can be used in your classes:

.. code-block:: php

    <?php

    use Atournayre\Common\Traits\ContextTrait;
    use Atournayre\Common\Traits\EventsTrait;
    use Atournayre\Common\Traits\IsTrait;
    use Atournayre\Contracts\Context\ContextInterface;

    class YourClass
    {
        // Add context functionality
        use ContextTrait;

        // Add events functionality
        use EventsTrait;

        // Add comparison functionality
        use IsTrait;

        public function __construct()
        {
            // Initialize events collection (required when using EventsTrait)
            $this->initializeEvents();
        }
    }

    // Using ContextTrait
    $object = new YourClass();
    $object = $object->withContext($context);
    $context = $object->context();
    $hasContext = $object->hasContext();

    // Using EventsTrait
    $events = $object->events();

    // Using IsTrait
    $isSame = $object->is($anotherObject);
    $isNotSame = $object->isNot($anotherObject);

Types Usage
~~~~~~~~~

The Framework provides several type classes for representing specific types of data:

.. code-block:: php

    <?php

    use Atournayre\Common\Types\DirectoryOrFile;
    use Atournayre\Common\Types\Domain;
    use Atournayre\Common\Types\HtmlTemplatePath;
    use Atournayre\Common\Types\TextTemplatePath;

    // Create a directory or file path
    $path = DirectoryOrFile::of('/path/to/file');
    $path = $path->suffixWith('/suffix');
    $path = $path->prefixWith('/prefix');

    // Create a domain
    $domain = Domain::of('example.com');

    // Create a template path
    $htmlPath = HtmlTemplatePath::of('/path/to/template.html.twig');
    $textPath = TextTemplatePath::of('/path/to/template.txt.twig');

Value Object Usage
~~~~~~~~~~~~~~~

The Framework provides several value object classes for representing specific types of data:

.. code-block:: php

    <?php

    use Atournayre\Common\VO\Duration;
    use Atournayre\Common\VO\Event;
    use Atournayre\Common\VO\Memory;
    use Atournayre\Common\VO\Uri;

    // Create a duration
    $duration = Duration::of(1000); // 1000 milliseconds
    $seconds = $duration->inSeconds(); // 1.0
    $minutes = $duration->inMinutes(); // 0.016666666666667
    $hours = $duration->inHours(); // 0.00027777777777778
    $days = $duration->inDays(); // 0.000011574074074074
    $readable = $duration->humanReadable(); // "1 second 0 milliseconds"

    // Create an event
    $event = new Event(/* ... */);

    // Create a memory object
    $memory = Memory::of(1024); // 1024 bytes
    $kilobytes = $memory->inKilobytes(); // 1.0
    $megabytes = $memory->inMegabytes(); // 0.0009765625
    $gigabytes = $memory->inGigabytes(); // 9.5367431640625E-7
    $readable = $memory->humanReadable(); // "1 KB"

    // Create a URI
    $uri = Uri::of('https://example.com/path?query=value#fragment');
    $scheme = $uri->scheme(); // "https"
    $host = $uri->host(); // "example.com"
    $path = $uri->path(); // "/path"
    $query = $uri->query(); // "query=value"
    $fragment = $uri->fragment(); // "fragment"

Primitives
----------

Primitives are the basic building blocks of the project. They are the smallest units of the project that can be used to build more complex structures.

The Framework provides several primitive types:

- ``BoolEnum``: A boolean primitive
- ``Collection``: A collection of items
- ``DateTime``: A date and time primitive
- ``Int_``: An integer primitive
- ``Locale``: A locale primitive
- ``Numeric``: A numeric primitive
- ``StringType``: A string primitive
- ``Ulid``: A ULID (Universally Unique Lexicographically Sortable Identifier) primitive
- ``Uuid``: A UUID (Universally Unique Identifier) primitive

StringType Usage
~~~~~~~~~~~~~~~

The ``StringType`` class provides a rich set of methods for working with strings:

.. code-block:: php

    <?php

    use Atournayre\Primitives\StringType;

    // Create a new StringType
    $string = StringType::of('Hello, World!');

    // Convert to uppercase
    $upperString = $string->upper(); // HELLO, WORLD!

    // Convert to lowercase
    $lowerString = $string->lower(); // hello, world!

    // Append text
    $appendedString = $string->append(' How are you?'); // Hello, World! How are you?

    // Prepend text
    $prependedString = $string->prepend('Greeting: '); // Greeting: Hello, World!

    // Replace text
    $replacedString = $string->replace('Hello', 'Hi'); // Hi, World!

    // Check if string starts with a prefix
    $startsWith = $string->startsWith('Hello'); // true

    // Check if string ends with a suffix
    $endsWith = $string->endsWith('World!'); // true

    // Get string length
    $length = $string->length(); // 13

    // Convert to camelCase
    $camelCase = StringType::of('hello_world')->camel(); // helloWorld

    // Convert to snake_case
    $snakeCase = StringType::of('helloWorld')->snake(); // hello_world

    // Convert to kebab-case
    $kebabCase = StringType::of('helloWorld')->kebab(); // hello-world

    // Convert to string
    $value = $string->toString(); // Hello, World!

Collection Usage
~~~~~~~~~~~~~~~

The ``Collection`` class provides methods for working with collections of items:

.. code-block:: php

    <?php

    use Atournayre\Primitives\Collection;

    // Create a new Collection
    $collection = Collection::of([1, 2, 3, 4, 5]);

    // Filter items
    $evenNumbers = $collection->filter(fn($item) => $item % 2 === 0); // [2, 4]

    // Map items
    $doubled = $collection->map(fn($item) => $item * 2); // [2, 4, 6, 8, 10]

    // Check if collection contains an item
    $contains = $collection->contains(3); // true

    // Get first item
    $first = $collection->first(); // 1

    // Get last item
    $last = $collection->last(); // 5

    // Get collection size
    $count = $collection->count(); // 5

DateTime Usage
~~~~~~~~~~~~~

The ``DateTime`` class provides methods for working with dates and times:

.. code-block:: php

    <?php

    use Atournayre\Primitives\DateTime;

    // Create a new DateTime
    $now = DateTime::now();

    // Create from string
    $date = DateTime::fromString('2023-01-01');

    // Format date
    $formatted = $date->format('Y-m-d'); // 2023-01-01

    // Add interval
    $tomorrow = $now->add('P1D'); // 1 day later

    // Subtract interval
    $yesterday = $now->sub('P1D'); // 1 day earlier

    // Compare dates
    $isAfter = $tomorrow->isAfter($now); // true
    $isBefore = $yesterday->isBefore($now); // true

Int_ Usage
~~~~~~~~~

The ``Int_`` class provides methods for working with integers:

.. code-block:: php

    <?php

    use Atournayre\Primitives\Int_;

    // Create a new Int_
    $integer = Int_::of(42);

    // Get value
    $value = $integer->value(); // 42

    // Convert to string
    $string = $integer->toString(); // "42"

    // Check if positive
    $isPositive = $integer->isPositive(); // true

    // Check if negative
    $isNegative = $integer->isNegative(); // false

    // Check if zero
    $isZero = $integer->isZero(); // false

    // Get absolute value
    $absolute = Int_::of(-42)->abs(); // 42

    // Check if even
    $isEven = $integer->isEven(); // true

    // Check if odd
    $isOdd = $integer->isOdd(); // false

    // Compare integers
    $greaterThan = $integer->greaterThan(30); // true
    $lessThan = $integer->lessThan(50); // true
    $equals = $integer->equalsTo(42); // true

    // Check if between values
    $between = $integer->between(30, 50); // true
    $betweenOrEqual = $integer->betweenOrEqual(42, 50); // true

BoolEnum Usage
~~~~~~~~~~~~

The ``BoolEnum`` class provides methods for working with boolean values:

.. code-block:: php

    <?php

    use Atournayre\Primitives\BoolEnum;

    // Create a new BoolEnum
    $true = BoolEnum::true();
    $false = BoolEnum::false();

    // Create from boolean
    $bool = BoolEnum::fromBool(true);

    // Check value
    $isTrue = $bool->isTrue(); // true
    $isFalse = $bool->isFalse(); // false

    // Convert to boolean
    $value = $bool->toBool(); // true

    // Logical operations
    $and = $bool->and(BoolEnum::true()); // true
    $or = $bool->or(BoolEnum::false()); // true
    $not = $bool->not(); // false

Uuid and Ulid Usage
~~~~~~~~~~~~~~~~

The ``Uuid`` and ``Ulid`` classes provide methods for working with universally unique identifiers:

.. code-block:: php

    <?php

    use Atournayre\Primitives\Uuid;
    use Atournayre\Primitives\Ulid;

    // Create a new Uuid
    $uuid = Uuid::generate();

    // Create from string
    $uuid = Uuid::fromString('550e8400-e29b-41d4-a716-446655440000');

    // Convert to string
    $string = $uuid->toString();

    // Create a new Ulid
    $ulid = Ulid::generate();

    // Create from string
    $ulid = Ulid::fromString('01ARZ3NDEKTSV4RRFFQ69G5FAV');

    // Convert to string
    $string = $ulid->toString();

Numeric Usage
~~~~~~~~~~~

The ``Numeric`` class provides methods for working with numeric values with precision control:

.. code-block:: php

    <?php

    use Atournayre\Primitives\Numeric;
    use Atournayre\Primitives\Locale;

    // Create a new Numeric
    $number = Numeric::of(123.45, 2); // 123.45 with 2 decimal places

    // Create from float
    $float = Numeric::fromFloat(123.45); // Automatically detects precision

    // Create from integer
    $int = Numeric::fromInt(123, 0); // 123 with 0 decimal places

    // Get value
    $value = $number->value(); // 123.45

    // Get integer value (scaled by precision)
    $intValue = $number->intValue(); // 12345

    // Get precision
    $precision = $number->precision(); // 2

    // Format with locale
    $formatted = $number->format(Locale::of(Locale::EN_US)); // "123.45"
    $formatted = $number->format(Locale::of(Locale::FR_FR)); // "123,45"

    // Round value
    $rounded = $number->round(); // 123.45 (no change if already rounded)
    $rounded = Numeric::of(123.456, 2)->round(); // 123.46

    // Compare numbers
    $greaterThan = $number->greaterThan(100); // true
    $lessThan = $number->lessThan(200); // true
    $equalTo = $number->equalTo(123.45); // true

    // Check if between values
    $between = $number->between(100, 200); // true
    $betweenOrEqual = $number->betweenOrEqual(123.45, 200); // true

    // Check if zero
    $isZero = $number->isZero(); // false

    // Get absolute value
    $absolute = Numeric::of(-123.45, 2)->abs(); // 123.45

Locale Usage
~~~~~~~~~~~

The ``Locale`` class provides methods for working with locales:

.. code-block:: php

    <?php

    use Atournayre\Primitives\Locale;

    // Create a locale
    $locale = Locale::of(Locale::EN_US);

    // Get locale code
    $code = $locale->code(); // "en_US"

    // Get full locale name
    $name = $locale->fullName(); // "English (United States)"

    // Use locale for formatting
    $frenchLocale = Locale::of(Locale::FR_FR);
    $germanLocale = Locale::of(Locale::DE_DE);
