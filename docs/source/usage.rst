Usage
=====

This guide provides examples of how to use the primitives in the Framework.

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
