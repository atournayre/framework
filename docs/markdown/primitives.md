# Primitives

The primitives system provides type wrappers with validation and a powerful immutable collection based on Aimeos Map.

## Collection

The `Collection` class wraps Aimeos Map providing 100+ collection methods.

### Creation

```php
use Atournayre\Primitives\Collection;

// From array/string/AimeosMap
$collection = Collection::of(collection: [1, 2, 3, 4, 5]);
$collection = Collection::of(collection: 'string'); // Converts to array
$collection = Collection::of(); // Empty collection

// Read-only collection
$readOnly = Collection::readOnly(collection: [1, 2, 3]);
$readOnly = $collection->asReadOnly();

// Check if read-only
$isReadOnly = $collection->isReadOnly(); // BoolEnum
```

### Collection Methods (from Aimeos Map)

All Aimeos Map methods are available. See [Aimeos Map documentation](https://aimeos.org/docs/latest/infrastructure/map/).

Common methods include:

```php
// Filtering & Searching
$filtered = $collection->filter(callback: fn($x) => $x > 2);
$found = $collection->find(callback: fn($x) => $x === 3);
$first = $collection->first();
$last = $collection->last();

// Transformation
$mapped = $collection->map(callback: fn($x) => $x * 2);
$flattened = $collection->flat();
$unique = $collection->unique();

// Aggregation
$sum = $collection->sum();
$avg = $collection->avg();
$count = $collection->count();

// Conversion
$array = $collection->toArray();
$json = $collection->toJson();
```

## Type Wrappers

### StringType

Wraps Symfony UnicodeString providing string manipulation methods.

```php
use Atournayre\Primitives\StringType;

// Creation
$string = StringType::of(value: 'hello world');
$string = StringType::fromPattern(string: 'Hello %s', 'World'); // sprintf

// Case transformation
$upper = $string->upper();
$lower = $string->lower();
$camel = $string->camel();      // helloWorld
$snake = $string->snake();      // hello_world
$kebab = $string->kebab();      // hello-world
$title = $string->title();      // Hello World

// String manipulation
$appended = $string->append('!', '!'); // "hello world!!"
$prepended = $string->prepend('> ');   // "> hello world"
$trimmed = $string->trim();
$sliced = $string->slice(start: 0, length: 5); // "hello"
$replaced = $string->replace(from: 'world', to: 'universe');
$repeated = $string->repeat(multiplier: 3);

// Validation & Comparison
$length = $string->length(); // Returns Numeric
$isBetween = $string->lengthIsBetween(start: 5, end: 20); // BoolEnum
$equals = $string->equalsTo(string: 'hello'); // BoolEnum
$startsWith = $string->startsWith(prefix: 'hello'); // BoolEnum
$endsWith = $string->endsWith(suffix: 'world'); // BoolEnum
$containsAny = $string->containsAny(needle: ['hi', 'hello']); // BoolEnum

// Advanced
$ascii = $string->ascii(); // Transliterate to ASCII
$normalized = $string->normalize(); // Unicode normalization
$chunks = $string->chunk(length: 2); // Array of 2-char strings
```

### Int_

Integer wrapper with validation and comparison.

```php
use Atournayre\Primitives\Int_;

// Creation
$number = Int_::of(value: 42);

// Access
$value = $number->value(); // 42
$string = $number->toString(); // "42"

// Validation
$isPositive = $number->isPositive(); // BoolEnum
$isNegative = $number->isNegative(); // BoolEnum
$isZero = $number->isZero(); // BoolEnum
$isEven = $number->isEven(); // BoolEnum
$isOdd = $number->isOdd(); // BoolEnum

// Comparison (all return BoolEnum)
$greater = $number->greaterThan(of: 10);
$greaterOrEqual = $number->greaterThanOrEqual(of: 42);
$less = $number->lessThan(of: 100);
$lessOrEqual = $number->lessThanOrEqual(of: 42);
$equals = $number->equalsTo(of: 42);
$between = $number->between(of: 0, of1: 100);
$betweenOrEqual = $number->betweenOrEqual(of: 0, of1: 100);

// Operations
$absolute = $number->abs();
```

### Numeric

Numeric (float/int) wrapper with precision support.

```php
use Atournayre\Primitives\Numeric;
use Atournayre\Primitives\Locale;

// Creation
$num = Numeric::of(value: 3.14, precision: 2);
$num = Numeric::fromFloat(float: 3.14159);
$num = Numeric::fromInt(value: 42, precision: 2);
$zero = Numeric::zero(precision: 2);

// Access
$value = $num->value(); // 3.14 (float)
$intValue = $num->intValue(); // 3
$precision = $num->precision(); // 2

// Formatting
$formatted = $num->format(locale: Locale::of(value: 'en_US')); // "3.14"

// Rounding
$rounded = $num->round(mode: PHP_ROUND_HALF_UP);

// Validation
$isZero = $num->isZero(); // BoolEnum

// Comparison (all return BoolEnum)
$greater = $num->greaterThan(numeric: 2.0);
$greaterOrEqual = $num->greaterThanOrEqual(numeric: 3.14);
$less = $num->lessThan(numeric: 5.0);
$lessOrEqual = $num->lessThanOrEqual(numeric: 3.14);
$equals = $num->equalTo(numeric: 3.14);
$notEquals = $num->notEqualTo(numeric: 2.0);
$between = $num->between(min: 0, max: 10);
$betweenOrEqual = $num->betweenOrEqual(min: 3.14, max: 10);

// Operations
$absolute = $num->abs();
```

### DateTime

DateTime wrapper using DateTimeTrait.

```php
use Atournayre\Primitives\DateTime;

// Creation
$date = DateTime::of(value: '2025-01-15 10:30:00');
$date = DateTime::of(value: new \DateTimeImmutable());

// Null DateTime
$nullDate = DateTime::asNull();

// Access components
$year = $date->year(); // 2025
$month = $date->month(); // 1
$day = $date->day(); // 15
$hour = $date->hour(); // 10
$minute = $date->minute(); // 30
$second = $date->second(); // 0

// ISO components
$yearIso = $date->yearIso();
$isoWeek = $date->isoWeek();
$dayOfWeekIso = $date->dayOfWeekIso();

// Additional components
$timestamp = $date->timestamp(); // Unix timestamp
$micro = $date->micro(); // Microseconds
$milliseconds = $date->milliseconds();
$week = $date->week();
$dayOfYear = $date->dayOfYear();
$daysInMonth = $date->daysInMonth();
$age = $date->age(); // Years since date
$offset = $date->offset(); // Timezone offset in seconds
$offsetMinutes = $date->offsetMinutes();
$offsetHours = $date->offsetHours();

// English day/month names
$dayName = $date->englishDayOfWeek(); // "Wednesday"
$shortDay = $date->shortEnglishDayOfWeek(); // "Wed"
$monthName = $date->englishMonth(); // "January"
$shortMonth = $date->shortEnglishMonth(); // "Jan"
$meridiem = $date->latinMeridiem(); // "AM" or "PM"

// Validation (all return BoolEnum)
$isAM = $date->isAM();
$isPM = $date->isPM();
$isWeekday = $date->isWeekday();
$isWeekend = $date->isWeekend();

// Comparison (all return BoolEnum)
$isAfter = $date->isAfter(datetime: $otherDate);
$isAfterOrEqual = $date->isAfterOrEqual(datetime: $otherDate);
$isBefore = $date->isBefore(datetime: $otherDate);
$isBeforeOrEqual = $date->isBeforeOrEqual(datetime: $otherDate);
$isSame = $date->isSame(datetime: $otherDate);
$isSameOrAfter = $date->isSameOrAfter(datetime: $otherDate);
$isSameOrBefore = $date->isSameOrBefore(datetime: $otherDate);
$isBetween = $date->isBetween(datetime1: $start, datetime2: $end);
$isBetweenOrEqual = $date->isBetweenOrEqual(datetime1: $start, datetime2: $end);
$isNotBetween = $date->isNotBetween(datetime1: $start, datetime2: $end);
$isSameOrBetween = $date->isSameOrBetween(datetime1: $start, datetime2: $end);

// Conversion
$dateTime = $date->toDateTime(); // \DateTimeInterface

// Timezone
$withTimezone = $date->setTimezone(timezone: 'Europe/Paris');
```

### Uuid

UUID v4 wrapper with validation.

```php
use Atournayre\Primitives\Uuid;

// Creation
$uuid = Uuid::v4(); // Generate new UUID v4
$uuid = Uuid::of(string: '550e8400-e29b-41d4-a716-446655440000');

// Conversion
$string = $uuid->toString(); // "550e8400-e29b-41d4-a716-446655440000"
$rfc4122 = $uuid->toRfc4122(); // StringType in RFC 4122 format

// Comparison
$equals = $uuid->equalsTo(uuid: $otherUuid); // BoolEnum
```

### Ulid

ULID wrapper with timestamp extraction.

```php
use Atournayre\Primitives\Ulid;

// Creation
$ulid = Ulid::of(); // Generate new ULID
$ulid = Ulid::of(string: '01ARZ3NDEKTSV4RRFFQ69G5FAV');

// Conversion
$string = $ulid->toString(); // "01ARZ3NDEKTSV4RRFFQ69G5FAV"
$rfc4122 = $ulid->toRfc4122(); // StringType in RFC 4122 format

// Extract timestamp
$dateTime = $ulid->dateTime(); // DateTimeInterface from ULID timestamp

// Comparison
$equals = $ulid->equalsTo(ulid: $otherUlid); // BoolEnum
```

## Specialized Collections

### DateTimeCollection

```php
use Atournayre\Primitives\Collection\DateTimeCollection;
use Atournayre\Primitives\DateTime;

$dates = DateTimeCollection::of(collection: [
    DateTime::of(value: '2025-01-15'),
    DateTime::of(value: '2025-02-20'),
]);

// DateTimeCollection inherits all Collection/Aimeos Map methods
```

### FileCollection

```php
use Atournayre\Primitives\Collection\FileCollection;

$files = FileCollection::of(collection: ['/path/to/file1.txt', '/path/to/file2.txt']);

// FileCollection inherits all Collection/Aimeos Map methods
```

## Usage Patterns

### Immutability

All operations return new instances:

```php
$original = Collection::of(collection: [1, 2, 3]);
$modified = $original->map(callback: fn($x) => $x * 2);

// $original remains unchanged: [1, 2, 3]
// $modified contains: [2, 4, 6]
```

### BoolEnum Returns

Many methods return `BoolEnum` instead of `bool`:

```php
$number = Int_::of(value: 42);
$isPositive = $number->isPositive(); // BoolEnum, not bool

// Convert to bool if needed
$boolValue = $isPositive->value(); // true
```

### Method Chaining

```php
$result = Collection::of(collection: [1, 2, 3, 4, 5, 6])
    ->filter(callback: fn($x) => $x % 2 === 0)
    ->map(callback: fn($x) => $x * 2)
    ->sort()
    ->toArray();
```

## Tests

```php
use PHPUnit\Framework\TestCase;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Int_;

class PrimitivesTest extends TestCase
{
    public function testCollection(): void
    {
        $collection = Collection::of(collection: [1, 2, 3, 4, 5]);
        $filtered = $collection->filter(callback: fn($x) => $x > 2);

        $this->assertEquals([3, 4, 5], $filtered->toArray());
    }

    public function testInt(): void
    {
        $number = Int_::of(value: 42);

        $this->assertTrue($number->isPositive()->value());
        $this->assertEquals(42, $number->value());
    }
}
```
