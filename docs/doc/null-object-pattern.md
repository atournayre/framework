# Null

## Nominal case
Before you used to have return type `string` and now you can use `Title` object.

```php
$title = Title::create('My title');

$title->title; // 'My title'
$title->isNull(); // false
$title->isNotNull(); // true
```

## Nullable case

Before you used to have return type `null` and now you can use `Title` object.

```php
$title = Title::asNull();

$title->title; // 'Empty title'
$title->isNull(); // true
$title->isNotNull(); // false
```

## Maybe nullable case

Before you used to have return type `?string` and now you can use `Title` object.

If you are not sure if the value is null or not, you can use `orNull()` method, it's a replacement of `?->` operator.

```php
$title = Title::create('My title')
    ->orNull()
    ->title; // 'My title'
```


```php
$title = Title::asNull()
    ->orNull()
    ->title; // 'Empty title'
```

Instead of using `orNull()` method, you can use `orThrow()` method to throw an exception if the value is null.

```php
$title = Title::asNull()
    ->orThrow(new \RuntimeException('Title is null'));
```

`orThrow()` also accepts a callable to throw an exception with a custom message.
```php
$title = Title::asNull()
    ->orThrow(fn () => new \RuntimeException('Title is null'));    
```
