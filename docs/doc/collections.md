# TypedCollection
```php
// Samples classes
class Person
{
    public function __construct(
        public string $name
    ) {}
}

class People extends TypedCollection
{
    protected static string $type = Person::class;
}
```

```php
// Create collection
$collection = People::asList([
    new Person('John'),
]);
$collection[] = new Person('Jack'); // Add item
```

# DateTimeCollection
```php
// Create collection
$collection = DateTimeCollection::asList([
    DateTime::of('2021-01-05'),
    DateTime::of('2021-01-04'),
    DateTime::of('2021-01-03'),
    DateTime::of('2021-01-02'),
    DateTime::of('2021-01-01'),
])->sortAsc();
```

# NumericCollection

```php
// Create collection
use Atournayre\Primitives\Collection\NumericCollection;
$collection = NumericCollection::asList([
    Numeric::of(1, 2),
    Numeric::of(2, 2),
]);
$collection->avg()->value(); // 1.50
$collection->max()->value(); // 2.00
$collection->min()->value(); // 1.00
$collection->sum()->value(); // 3.00
```

# FileCollection

```php
// Create collection
use Atournayre\Primitives\Collection\FileCollection;

$collection = FileCollection::asList([
    new SplFileInfo('file1.txt'),
    new SplFileInfo('file2.txt'),
]);
$collection->filterByContent('dummy');
$collection->filterByExtension('txt');
$collection->filterBySize(100);
$collection->totalSize();
```
