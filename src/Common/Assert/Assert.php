<?php

declare(strict_types=1);

namespace Atournayre\Common\Assert;

use Atournayre\Contracts\Common\Assert\AssertInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Primitive;
use Atournayre\Primitives\StringType;
use Webmozart\Assert\InvalidArgumentException;

/**
 * @template T
 */
final class Assert implements AssertInterface
{
    /**
     * @var array|string[]
     */
    private static array $primitiveTypes = [
        Primitive::STRING,
        Primitive::INT,
        Primitive::FLOAT,
        Primitive::BOOL,
        Primitive::ARRAY,
        Primitive::NULL,
        Primitive::OBJECT,
    ];

    /**
     * @param array<T> $array
     *
     * @throws InvalidArgumentException
     */
    public static function isListOf(array $array, string $classOrType, string $message = ''): void
    {
        if ('' === $message) {
            $message = \sprintf('Expected list - non-associative array of %s.', $classOrType);
        }

        \Webmozart\Assert\Assert::isList($array, $message);

        if (Primitive::MIXED === $classOrType) {
            return;
        }

        if (in_array($classOrType, self::$primitiveTypes, true)) {
            Assert::allIsType($array, $classOrType, $message);

            return;
        }

        \Webmozart\Assert\Assert::allIsInstanceOf($array, $classOrType, $message);
    }

    /**
     * @param array<T> $array
     *
     * @throws InvalidArgumentException
     */
    public static function isMapOf(array $array, string $classOrType, string $message = ''): void
    {
        if ('' === $message) {
            $message = \sprintf('Expected map - associative array with string keys of %s.', $classOrType);
        }

        \Webmozart\Assert\Assert::isMap($array, $message);

        if (Primitive::MIXED === $classOrType) {
            return;
        }

        if (in_array($classOrType, self::$primitiveTypes, true)) {
            Assert::allIsType($array, $classOrType, $message);

            return;
        }

        \Webmozart\Assert\Assert::allIsInstanceOf($array, $classOrType, $message);
    }

    /**
     * @param string|int|float|bool|object|array<int|string, mixed>|null $value
     *
     * @throws InvalidArgumentException
     */
    public static function isType($value, string $type, string $message = ''): void
    {
        switch ($type) {
            case Primitive::STRING:
                \Webmozart\Assert\Assert::string($value, $message);
                break;
            case Primitive::INT:
                \Webmozart\Assert\Assert::integer($value, $message);
                break;
            case Primitive::FLOAT:
                \Webmozart\Assert\Assert::float($value, $message);
                break;
            case Primitive::BOOL:
                \Webmozart\Assert\Assert::boolean($value, $message);
                break;
            case Primitive::ARRAY:
                \Webmozart\Assert\Assert::isArray($value, $message);
                break;
            case Primitive::OBJECT:
                \Webmozart\Assert\Assert::object($value, $message);
                break;
            case Primitive::NULL:
                \Webmozart\Assert\Assert::null($value, $message);
                break;
            default:
                throw new InvalidArgumentException(\sprintf('Invalid type "%s". Expected one of "string", "int", "float", "bool", "array", "object" or "null".', $type));
        }
    }

    /**
     * @param array<T> $value
     *
     * @throws InvalidArgumentException
     */
    public static function allIsType(array $value, string $type, string $message = ''): void
    {
        foreach ($value as $element) {
            Assert::isType($element, $type, $message);
        }
    }

    /**
     * @throws ThrowableInterface
     */
    public static function __callStatic($name, $arguments)
    {
        $method = StringType::of($name)
            ->prepend(\Webmozart\Assert\Assert::class, '::')
            ->toString()
        ;

        try {
            $method(...$arguments);
        } catch (\Throwable $throwable) {
            \Atournayre\Exception\InvalidArgumentException::fromThrowable($throwable)->throw();
        }
    }

    public static function string($value, $message = '')
    {
        return self::__callStatic('string', [$value, $message]);
    }

    public static function stringNotEmpty($value, $message = '')
    {
        return self::__callStatic('stringNotEmpty', [$value, $message]);
    }

    public static function integer($value, $message = '')
    {
        return self::__callStatic('integer', [$value, $message]);
    }

    public static function integerish($value, $message = '')
    {
        return self::__callStatic('integerish', [$value, $message]);
    }

    public static function positiveInteger($value, $message = '')
    {
        return self::__callStatic('positiveInteger', [$value, $message]);
    }

    public static function float($value, $message = '')
    {
        return self::__callStatic('float', [$value, $message]);
    }

    public static function numeric($value, $message = '')
    {
        return self::__callStatic('numeric', [$value, $message]);
    }

    public static function natural($value, $message = '')
    {
        return self::__callStatic('natural', [$value, $message]);
    }

    public static function boolean($value, $message = '')
    {
        return self::__callStatic('boolean', [$value, $message]);
    }

    public static function scalar($value, $message = '')
    {
        return self::__callStatic('scalar', [$value, $message]);
    }

    public static function object($value, $message = '')
    {
        return self::__callStatic('object', [$value, $message]);
    }

    public static function resource($value, $type = null, $message = '')
    {
        return self::__callStatic('resource', [$value, $type, $message]);
    }

    public static function isCallable($value, $message = '')
    {
        return self::__callStatic('isCallable', [$value, $message]);
    }

    public static function isArray($value, $message = '')
    {
        return self::__callStatic('isArray', [$value, $message]);
    }

    public static function isTraversable($value, $message = '')
    {
        return self::__callStatic('isTraversable', [$value, $message]);
    }

    public static function isArrayAccessible($value, $message = '')
    {
        return self::__callStatic('isArrayAccessible', [$value, $message]);
    }

    public static function isCountable($value, $message = '')
    {
        return self::__callStatic('isCountable', [$value, $message]);
    }

    public static function isIterable($value, $message = '')
    {
        return self::__callStatic('isIterable', [$value, $message]);
    }

    public static function isInstanceOf($value, $class, $message = '')
    {
        return self::__callStatic('isInstanceOf', [$value, $class, $message]);
    }

    public static function notInstanceOf($value, $class, $message = '')
    {
        return self::__callStatic('notInstanceOf', [$value, $class, $message]);
    }

    public static function isInstanceOfAny($value, array $classes, $message = '')
    {
        return self::__callStatic('isInstanceOfAny', [$value, $classes, $message]);
    }

    public static function isAOf($value, $class, $message = '')
    {
        return self::__callStatic('isAOf', [$value, $class, $message]);
    }

    public static function isNotA($value, $class, $message = '')
    {
        return self::__callStatic('isNotA', [$value, $class, $message]);
    }

    public static function isAnyOf($value, array $classes, $message = '')
    {
        return self::__callStatic('isAnyOf', [$value, $classes, $message]);
    }

    public static function isEmpty($value, $message = '')
    {
        return self::__callStatic('isEmpty', [$value, $message]);
    }

    public static function notEmpty($value, $message = '')
    {
        return self::__callStatic('notEmpty', [$value, $message]);
    }

    public static function null($value, $message = '')
    {
        return self::__callStatic('null', [$value, $message]);
    }

    public static function notNull($value, $message = '')
    {
        return self::__callStatic('notNull', [$value, $message]);
    }

    public static function true($value, $message = '')
    {
        return self::__callStatic('true', [$value, $message]);
    }

    public static function false($value, $message = '')
    {
        return self::__callStatic('false', [$value, $message]);
    }

    public static function notFalse($value, $message = '')
    {
        return self::__callStatic('notFalse', [$value, $message]);
    }

    public static function ip($value, $message = '')
    {
        return self::__callStatic('ip', [$value, $message]);
    }

    public static function ipv4($value, $message = '')
    {
        return self::__callStatic('ipv4', [$value, $message]);
    }

    public static function ipv6($value, $message = '')
    {
        return self::__callStatic('ipv6', [$value, $message]);
    }

    public static function email($value, $message = '')
    {
        return self::__callStatic('email', [$value, $message]);
    }

    public static function uniqueValues(array $values, $message = '')
    {
        return self::__callStatic('uniqueValues', [$values, $message]);
    }

    public static function eq($value, $expect, $message = '')
    {
        return self::__callStatic('eq', [$value, $expect, $message]);
    }

    public static function notEq($value, $expect, $message = '')
    {
        return self::__callStatic('notEq', [$value, $expect, $message]);
    }

    public static function same($value, $expect, $message = '')
    {
        return self::__callStatic('same', [$value, $expect, $message]);
    }

    public static function notSame($value, $expect, $message = '')
    {
        return self::__callStatic('notSame', [$value, $expect, $message]);
    }

    public static function greaterThan($value, $limit, $message = '')
    {
        return self::__callStatic('greaterThan', [$value, $limit, $message]);
    }

    public static function greaterThanEq($value, $limit, $message = '')
    {
        return self::__callStatic('greaterThanEq', [$value, $limit, $message]);
    }

    public static function lessThan($value, $limit, $message = '')
    {
        return self::__callStatic('lessThan', [$value, $limit, $message]);
    }

    public static function lessThanEq($value, $limit, $message = '')
    {
        return self::__callStatic('lessThanEq', [$value, $limit, $message]);
    }

    public static function range($value, $min, $max, $message = '')
    {
        return self::__callStatic('range', [$value, $min, $max, $message]);
    }

    public static function oneOf($value, array $values, $message = '')
    {
        return self::__callStatic('oneOf', [$value, $values, $message]);
    }

    public static function inArray($value, array $values, $message = '')
    {
        return self::__callStatic('inArray', [$value, $values, $message]);
    }

    public static function contains($value, $subString, $message = '')
    {
        return self::__callStatic('contains', [$value, $subString, $message]);
    }

    public static function notContains($value, $subString, $message = '')
    {
        return self::__callStatic('notContains', [$value, $subString, $message]);
    }

    public static function notWhitespaceOnly($value, $message = '')
    {
        return self::__callStatic('notWhitespaceOnly', [$value, $message]);
    }

    public static function startsWith($value, $prefix, $message = '')
    {
        return self::__callStatic('startsWith', [$value, $prefix, $message]);
    }

    public static function notStartsWith($value, $prefix, $message = '')
    {
        return self::__callStatic('notStartsWith', [$value, $prefix, $message]);
    }

    public static function startsWithLetter($value, $message = '')
    {
        return self::__callStatic('startsWithLetter', [$value, $message]);
    }

    public static function endsWith($value, $suffix, $message = '')
    {
        return self::__callStatic('endsWith', [$value, $suffix, $message]);
    }

    public static function notEndsWith($value, $suffix, $message = '')
    {
        return self::__callStatic('notEndsWith', [$value, $suffix, $message]);
    }

    public static function regex($value, $pattern, $message = '')
    {
        return self::__callStatic('regex', [$value, $pattern, $message]);
    }

    public static function notRegex($value, $pattern, $message = '')
    {
        return self::__callStatic('notRegex', [$value, $pattern, $message]);
    }

    public static function unicodeLetters($value, $message = '')
    {
        return self::__callStatic('unicodeLetters', [$value, $message]);
    }

    public static function alpha($value, $message = '')
    {
        return self::__callStatic('alpha', [$value, $message]);
    }

    public static function digits($value, $message = '')
    {
        return self::__callStatic('digits', [$value, $message]);
    }

    public static function alnum($value, $message = '')
    {
        return self::__callStatic('alnum', [$value, $message]);
    }

    public static function lower($value, $message = '')
    {
        return self::__callStatic('lower', [$value, $message]);
    }

    public static function upper($value, $message = '')
    {
        return self::__callStatic('upper', [$value, $message]);
    }

    public static function length($value, $length, $message = '')
    {
        return self::__callStatic('length', [$value, $length, $message]);
    }

    public static function minLength($value, $min, $message = '')
    {
        return self::__callStatic('minLength', [$value, $min, $message]);
    }

    public static function maxLength($value, $max, $message = '')
    {
        return self::__callStatic('maxLength', [$value, $max, $message]);
    }

    public static function lengthBetween($value, $min, $max, $message = '')
    {
        return self::__callStatic('lengthBetween', [$value, $min, $max, $message]);
    }

    public static function fileExists($value, $message = '')
    {
        return self::__callStatic('fileExists', [$value, $message]);
    }

    public static function file($value, $message = '')
    {
        return self::__callStatic('file', [$value, $message]);
    }

    public static function directory($value, $message = '')
    {
        return self::__callStatic('directory', [$value, $message]);
    }

    public static function readable($value, $message = '')
    {
        return self::__callStatic('readable', [$value, $message]);
    }

    public static function writable($value, $message = '')
    {
        return self::__callStatic('writable', [$value, $message]);
    }

    public static function classExists($value, $message = '')
    {
        return self::__callStatic('classExists', [$value, $message]);
    }

    public static function subclassOf($value, $class, $message = '')
    {
        return self::__callStatic('subclassOf', [$value, $class, $message]);
    }

    public static function interfaceExists($value, $message = '')
    {
        return self::__callStatic('interfaceExists', [$value, $message]);
    }

    public static function implementsInterface($value, $interface, $message = '')
    {
        return self::__callStatic('implementsInterface', [$value, $interface, $message]);
    }

    public static function propertyExists($classOrObject, $property, $message = '')
    {
        return self::__callStatic('propertyExists', [$classOrObject, $property, $message]);
    }

    public static function propertyNotExists($classOrObject, $property, $message = '')
    {
        return self::__callStatic('propertyNotExists', [$classOrObject, $property, $message]);
    }

    public static function methodExists($classOrObject, $method, $message = '')
    {
        return self::__callStatic('methodExists', [$classOrObject, $method, $message]);
    }

    public static function methodNotExists($classOrObject, $method, $message = '')
    {
        return self::__callStatic('methodNotExists', [$classOrObject, $method, $message]);
    }

    public static function keyExists($array, $key, $message = '')
    {
        return self::__callStatic('keyExists', [$array, $key, $message]);
    }

    public static function keyNotExists($array, $key, $message = '')
    {
        return self::__callStatic('keyNotExists', [$array, $key, $message]);
    }

    public static function validArrayKey($value, $message = '')
    {
        return self::__callStatic('validArrayKey', [$value, $message]);
    }

    public static function count($array, $number, $message = '')
    {
        return self::__callStatic('count', [$array, $number, $message]);
    }

    public static function minCount($array, $min, $message = '')
    {
        return self::__callStatic('minCount', [$array, $min, $message]);
    }

    public static function maxCount($array, $max, $message = '')
    {
        return self::__callStatic('maxCount', [$array, $max, $message]);
    }

    public static function countBetween($array, $min, $max, $message = '')
    {
        return self::__callStatic('countBetween', [$array, $min, $max, $message]);
    }

    public static function isList($array, $message = '')
    {
        return self::__callStatic('isList', [$array, $message]);
    }

    public static function isNonEmptyList($array, $message = '')
    {
        return self::__callStatic('isNonEmptyList', [$array, $message]);
    }

    public static function isMap($array, $message = '')
    {
        return self::__callStatic('isMap', [$array, $message]);
    }

    public static function isNonEmptyMap($array, $message = '')
    {
        return self::__callStatic('isNonEmptyMap', [$array, $message]);
    }

    public static function uuid($value, $message = '')
    {
        return self::__callStatic('uuid', [$value, $message]);
    }

    public static function throws(\Closure $expression, $class = 'Exception', $message = '')
    {
        return self::__callStatic('throws', [$expression, $class, $message]);
    }

    public static function nullOrString($value, $message = '')
    {
        return self::__callStatic('nullOrString', [$value, $message]);
    }

    public static function allString($value, $message = '')
    {
        return self::__callStatic('allString', [$value, $message]);
    }

    public static function allNullOrString($value, $message = '')
    {
        return self::__callStatic('allNullOrString', [$value, $message]);
    }

    public static function nullOrStringNotEmpty($value, $message = '')
    {
        return self::__callStatic('nullOrStringNotEmpty', [$value, $message]);
    }

    public static function allStringNotEmpty($value, $message = '')
    {
        return self::__callStatic('allStringNotEmpty', [$value, $message]);
    }

    public static function allNullOrStringNotEmpty($value, $message = '')
    {
        return self::__callStatic('allNullOrStringNotEmpty', [$value, $message]);
    }

    public static function nullOrInteger($value, $message = '')
    {
        return self::__callStatic('nullOrInteger', [$value, $message]);
    }

    public static function allInteger($value, $message = '')
    {
        return self::__callStatic('allInteger', [$value, $message]);
    }

    public static function allNullOrInteger($value, $message = '')
    {
        return self::__callStatic('allNullOrInteger', [$value, $message]);
    }

    public static function nullOrIntegerish($value, $message = '')
    {
        return self::__callStatic('nullOrIntegerish', [$value, $message]);
    }

    public static function allIntegerish($value, $message = '')
    {
        return self::__callStatic('allIntegerish', [$value, $message]);
    }

    public static function allNullOrIntegerish($value, $message = '')
    {
        return self::__callStatic('allNullOrIntegerish', [$value, $message]);
    }

    public static function nullOrPositiveInteger($value, $message = '')
    {
        return self::__callStatic('nullOrPositiveInteger', [$value, $message]);
    }

    public static function allPositiveInteger($value, $message = '')
    {
        return self::__callStatic('allPositiveInteger', [$value, $message]);
    }

    public static function allNullOrPositiveInteger($value, $message = '')
    {
        return self::__callStatic('allNullOrPositiveInteger', [$value, $message]);
    }

    public static function nullOrFloat($value, $message = '')
    {
        return self::__callStatic('nullOrFloat', [$value, $message]);
    }

    public static function allFloat($value, $message = '')
    {
        return self::__callStatic('allFloat', [$value, $message]);
    }

    public static function allNullOrFloat($value, $message = '')
    {
        return self::__callStatic('allNullOrFloat', [$value, $message]);
    }

    public static function nullOrNumeric($value, $message = '')
    {
        return self::__callStatic('nullOrNumeric', [$value, $message]);
    }

    public static function allNumeric($value, $message = '')
    {
        return self::__callStatic('allNumeric', [$value, $message]);
    }

    public static function allNullOrNumeric($value, $message = '')
    {
        return self::__callStatic('allNullOrNumeric', [$value, $message]);
    }

    public static function nullOrNatural($value, $message = '')
    {
        return self::__callStatic('nullOrNatural', [$value, $message]);
    }

    public static function allNatural($value, $message = '')
    {
        return self::__callStatic('allNatural', [$value, $message]);
    }

    public static function allNullOrNatural($value, $message = '')
    {
        return self::__callStatic('allNullOrNatural', [$value, $message]);
    }

    public static function nullOrBoolean($value, $message = '')
    {
        return self::__callStatic('nullOrBoolean', [$value, $message]);
    }

    public static function allBoolean($value, $message = '')
    {
        return self::__callStatic('allBoolean', [$value, $message]);
    }

    public static function allNullOrBoolean($value, $message = '')
    {
        return self::__callStatic('allNullOrBoolean', [$value, $message]);
    }

    public static function nullOrScalar($value, $message = '')
    {
        return self::__callStatic('nullOrScalar', [$value, $message]);
    }

    public static function allScalar($value, $message = '')
    {
        return self::__callStatic('allScalar', [$value, $message]);
    }

    public static function allNullOrScalar($value, $message = '')
    {
        return self::__callStatic('allNullOrScalar', [$value, $message]);
    }

    public static function nullOrObject($value, $message = '')
    {
        return self::__callStatic('nullOrObject', [$value, $message]);
    }

    public static function allObject($value, $message = '')
    {
        return self::__callStatic('allObject', [$value, $message]);
    }

    public static function allNullOrObject($value, $message = '')
    {
        return self::__callStatic('allNullOrObject', [$value, $message]);
    }

    public static function nullOrResource($value, $type = null, $message = '')
    {
        return self::__callStatic('nullOrResource', [$value, $type, $message]);
    }

    public static function allResource($value, $type = null, $message = '')
    {
        return self::__callStatic('allResource', [$value, $type, $message]);
    }

    public static function allNullOrResource($value, $type = null, $message = '')
    {
        return self::__callStatic('allNullOrResource', [$value, $type, $message]);
    }

    public static function nullOrIsCallable($value, $message = '')
    {
        return self::__callStatic('nullOrIsCallable', [$value, $message]);
    }

    public static function allIsCallable($value, $message = '')
    {
        return self::__callStatic('allIsCallable', [$value, $message]);
    }

    public static function allNullOrIsCallable($value, $message = '')
    {
        return self::__callStatic('allNullOrIsCallable', [$value, $message]);
    }

    public static function nullOrIsArray($value, $message = '')
    {
        return self::__callStatic('nullOrIsArray', [$value, $message]);
    }

    public static function allIsArray($value, $message = '')
    {
        return self::__callStatic('allIsArray', [$value, $message]);
    }

    public static function allNullOrIsArray($value, $message = '')
    {
        return self::__callStatic('allNullOrIsArray', [$value, $message]);
    }

    public static function nullOrIsTraversable($value, $message = '')
    {
        return self::__callStatic('nullOrIsTraversable', [$value, $message]);
    }

    public static function allIsTraversable($value, $message = '')
    {
        return self::__callStatic('allIsTraversable', [$value, $message]);
    }

    public static function allNullOrIsTraversable($value, $message = '')
    {
        return self::__callStatic('allNullOrIsTraversable', [$value, $message]);
    }

    public static function nullOrIsArrayAccessible($value, $message = '')
    {
        return self::__callStatic('nullOrIsArrayAccessible', [$value, $message]);
    }

    public static function allIsArrayAccessible($value, $message = '')
    {
        return self::__callStatic('allIsArrayAccessible', [$value, $message]);
    }

    public static function allNullOrIsArrayAccessible($value, $message = '')
    {
        return self::__callStatic('allNullOrIsArrayAccessible', [$value, $message]);
    }

    public static function nullOrIsCountable($value, $message = '')
    {
        return self::__callStatic('nullOrIsCountable', [$value, $message]);
    }

    public static function allIsCountable($value, $message = '')
    {
        return self::__callStatic('allIsCountable', [$value, $message]);
    }

    public static function allNullOrIsCountable($value, $message = '')
    {
        return self::__callStatic('allNullOrIsCountable', [$value, $message]);
    }

    public static function nullOrIsIterable($value, $message = '')
    {
        return self::__callStatic('nullOrIsIterable', [$value, $message]);
    }

    public static function allIsIterable($value, $message = '')
    {
        return self::__callStatic('allIsIterable', [$value, $message]);
    }

    public static function allNullOrIsIterable($value, $message = '')
    {
        return self::__callStatic('allNullOrIsIterable', [$value, $message]);
    }

    public static function nullOrIsInstanceOf($value, $class, $message = '')
    {
        return self::__callStatic('nullOrIsInstanceOf', [$value, $class, $message]);
    }

    public static function allIsInstanceOf($value, $class, $message = '')
    {
        return self::__callStatic('allIsInstanceOf', [$value, $class, $message]);
    }

    public static function allNullOrIsInstanceOf($value, $class, $message = '')
    {
        return self::__callStatic('allNullOrIsInstanceOf', [$value, $class, $message]);
    }

    public static function nullOrNotInstanceOf($value, $class, $message = '')
    {
        return self::__callStatic('nullOrNotInstanceOf', [$value, $class, $message]);
    }

    public static function allNotInstanceOf($value, $class, $message = '')
    {
        return self::__callStatic('allNotInstanceOf', [$value, $class, $message]);
    }

    public static function allNullOrNotInstanceOf($value, $class, $message = '')
    {
        return self::__callStatic('allNullOrNotInstanceOf', [$value, $class, $message]);
    }

    public static function nullOrIsInstanceOfAny($value, $classes, $message = '')
    {
        return self::__callStatic('nullOrIsInstanceOfAny', [$value, $classes, $message]);
    }

    public static function allIsInstanceOfAny($value, $classes, $message = '')
    {
        return self::__callStatic('allIsInstanceOfAny', [$value, $classes, $message]);
    }

    public static function allNullOrIsInstanceOfAny($value, $classes, $message = '')
    {
        return self::__callStatic('allNullOrIsInstanceOfAny', [$value, $classes, $message]);
    }

    public static function nullOrIsAOf($value, $class, $message = '')
    {
        return self::__callStatic('nullOrIsAOf', [$value, $class, $message]);
    }

    public static function allIsAOf($value, $class, $message = '')
    {
        return self::__callStatic('allIsAOf', [$value, $class, $message]);
    }

    public static function allNullOrIsAOf($value, $class, $message = '')
    {
        return self::__callStatic('allNullOrIsAOf', [$value, $class, $message]);
    }

    public static function nullOrIsNotA($value, $class, $message = '')
    {
        return self::__callStatic('nullOrIsNotA', [$value, $class, $message]);
    }

    public static function allIsNotA($value, $class, $message = '')
    {
        return self::__callStatic('allIsNotA', [$value, $class, $message]);
    }

    public static function allNullOrIsNotA($value, $class, $message = '')
    {
        return self::__callStatic('allNullOrIsNotA', [$value, $class, $message]);
    }

    public static function nullOrIsAnyOf($value, $classes, $message = '')
    {
        return self::__callStatic('nullOrIsAnyOf', [$value, $classes, $message]);
    }

    public static function allIsAnyOf($value, $classes, $message = '')
    {
        return self::__callStatic('allIsAnyOf', [$value, $classes, $message]);
    }

    public static function allNullOrIsAnyOf($value, $classes, $message = '')
    {
        return self::__callStatic('allNullOrIsAnyOf', [$value, $classes, $message]);
    }

    public static function nullOrIsEmpty($value, $message = '')
    {
        return self::__callStatic('nullOrIsEmpty', [$value, $message]);
    }

    public static function allIsEmpty($value, $message = '')
    {
        return self::__callStatic('allIsEmpty', [$value, $message]);
    }

    public static function allNullOrIsEmpty($value, $message = '')
    {
        return self::__callStatic('allNullOrIsEmpty', [$value, $message]);
    }

    public static function nullOrNotEmpty($value, $message = '')
    {
        return self::__callStatic('nullOrNotEmpty', [$value, $message]);
    }

    public static function allNotEmpty($value, $message = '')
    {
        return self::__callStatic('allNotEmpty', [$value, $message]);
    }

    public static function allNullOrNotEmpty($value, $message = '')
    {
        return self::__callStatic('allNullOrNotEmpty', [$value, $message]);
    }

    public static function allNull($value, $message = '')
    {
        return self::__callStatic('allNull', [$value, $message]);
    }

    public static function allNotNull($value, $message = '')
    {
        return self::__callStatic('allNotNull', [$value, $message]);
    }

    public static function nullOrTrue($value, $message = '')
    {
        return self::__callStatic('nullOrTrue', [$value, $message]);
    }

    public static function allTrue($value, $message = '')
    {
        return self::__callStatic('allTrue', [$value, $message]);
    }

    public static function allNullOrTrue($value, $message = '')
    {
        return self::__callStatic('allNullOrTrue', [$value, $message]);
    }

    public static function nullOrFalse($value, $message = '')
    {
        return self::__callStatic('nullOrFalse', [$value, $message]);
    }

    public static function allFalse($value, $message = '')
    {
        return self::__callStatic('allFalse', [$value, $message]);
    }

    public static function allNullOrFalse($value, $message = '')
    {
        return self::__callStatic('allNullOrFalse', [$value, $message]);
    }

    public static function nullOrNotFalse($value, $message = '')
    {
        return self::__callStatic('nullOrNotFalse', [$value, $message]);
    }

    public static function allNotFalse($value, $message = '')
    {
        return self::__callStatic('allNotFalse', [$value, $message]);
    }

    public static function allNullOrNotFalse($value, $message = '')
    {
        return self::__callStatic('allNullOrNotFalse', [$value, $message]);
    }

    public static function nullOrIp($value, $message = '')
    {
        return self::__callStatic('nullOrIp', [$value, $message]);
    }

    public static function allIp($value, $message = '')
    {
        return self::__callStatic('allIp', [$value, $message]);
    }

    public static function allNullOrIp($value, $message = '')
    {
        return self::__callStatic('allNullOrIp', [$value, $message]);
    }

    public static function nullOrIpv4($value, $message = '')
    {
        return self::__callStatic('nullOrIpv4', [$value, $message]);
    }

    public static function allIpv4($value, $message = '')
    {
        return self::__callStatic('allIpv4', [$value, $message]);
    }

    public static function allNullOrIpv4($value, $message = '')
    {
        return self::__callStatic('allNullOrIpv4', [$value, $message]);
    }

    public static function nullOrIpv6($value, $message = '')
    {
        return self::__callStatic('nullOrIpv6', [$value, $message]);
    }

    public static function allIpv6($value, $message = '')
    {
        return self::__callStatic('allIpv6', [$value, $message]);
    }

    public static function allNullOrIpv6($value, $message = '')
    {
        return self::__callStatic('allNullOrIpv6', [$value, $message]);
    }

    public static function nullOrEmail($value, $message = '')
    {
        return self::__callStatic('nullOrEmail', [$value, $message]);
    }

    public static function allEmail($value, $message = '')
    {
        return self::__callStatic('allEmail', [$value, $message]);
    }

    public static function allNullOrEmail($value, $message = '')
    {
        return self::__callStatic('allNullOrEmail', [$value, $message]);
    }

    public static function nullOrUniqueValues($values, $message = '')
    {
        return self::__callStatic('nullOrUniqueValues', [$values, $message]);
    }

    public static function allUniqueValues($values, $message = '')
    {
        return self::__callStatic('allUniqueValues', [$values, $message]);
    }

    public static function allNullOrUniqueValues($values, $message = '')
    {
        return self::__callStatic('allNullOrUniqueValues', [$values, $message]);
    }

    public static function nullOrEq($value, $expect, $message = '')
    {
        return self::__callStatic('nullOrEq', [$value, $expect, $message]);
    }

    public static function allEq($value, $expect, $message = '')
    {
        return self::__callStatic('allEq', [$value, $expect, $message]);
    }

    public static function allNullOrEq($value, $expect, $message = '')
    {
        return self::__callStatic('allNullOrEq', [$value, $expect, $message]);
    }

    public static function nullOrNotEq($value, $expect, $message = '')
    {
        return self::__callStatic('nullOrNotEq', [$value, $expect, $message]);
    }

    public static function allNotEq($value, $expect, $message = '')
    {
        return self::__callStatic('allNotEq', [$value, $expect, $message]);
    }

    public static function allNullOrNotEq($value, $expect, $message = '')
    {
        return self::__callStatic('allNullOrNotEq', [$value, $expect, $message]);
    }

    public static function nullOrSame($value, $expect, $message = '')
    {
        return self::__callStatic('nullOrSame', [$value, $expect, $message]);
    }

    public static function allSame($value, $expect, $message = '')
    {
        return self::__callStatic('allSame', [$value, $expect, $message]);
    }

    public static function allNullOrSame($value, $expect, $message = '')
    {
        return self::__callStatic('allNullOrSame', [$value, $expect, $message]);
    }

    public static function nullOrNotSame($value, $expect, $message = '')
    {
        return self::__callStatic('nullOrNotSame', [$value, $expect, $message]);
    }

    public static function allNotSame($value, $expect, $message = '')
    {
        return self::__callStatic('allNotSame', [$value, $expect, $message]);
    }

    public static function allNullOrNotSame($value, $expect, $message = '')
    {
        return self::__callStatic('allNullOrNotSame', [$value, $expect, $message]);
    }

    public static function nullOrGreaterThan($value, $limit, $message = '')
    {
        return self::__callStatic('nullOrGreaterThan', [$value, $limit, $message]);
    }

    public static function allGreaterThan($value, $limit, $message = '')
    {
        return self::__callStatic('allGreaterThan', [$value, $limit, $message]);
    }

    public static function allNullOrGreaterThan($value, $limit, $message = '')
    {
        return self::__callStatic('allNullOrGreaterThan', [$value, $limit, $message]);
    }

    public static function nullOrGreaterThanEq($value, $limit, $message = '')
    {
        return self::__callStatic('nullOrGreaterThanEq', [$value, $limit, $message]);
    }

    public static function allGreaterThanEq($value, $limit, $message = '')
    {
        return self::__callStatic('allGreaterThanEq', [$value, $limit, $message]);
    }

    public static function allNullOrGreaterThanEq($value, $limit, $message = '')
    {
        return self::__callStatic('allNullOrGreaterThanEq', [$value, $limit, $message]);
    }

    public static function nullOrLessThan($value, $limit, $message = '')
    {
        return self::__callStatic('nullOrLessThan', [$value, $limit, $message]);
    }

    public static function allLessThan($value, $limit, $message = '')
    {
        return self::__callStatic('allLessThan', [$value, $limit, $message]);
    }

    public static function allNullOrLessThan($value, $limit, $message = '')
    {
        return self::__callStatic('allNullOrLessThan', [$value, $limit, $message]);
    }

    public static function nullOrLessThanEq($value, $limit, $message = '')
    {
        return self::__callStatic('nullOrLessThanEq', [$value, $limit, $message]);
    }

    public static function allLessThanEq($value, $limit, $message = '')
    {
        return self::__callStatic('allLessThanEq', [$value, $limit, $message]);
    }

    public static function allNullOrLessThanEq($value, $limit, $message = '')
    {
        return self::__callStatic('allNullOrLessThanEq', [$value, $limit, $message]);
    }

    public static function nullOrRange($value, $min, $max, $message = '')
    {
        return self::__callStatic('nullOrRange', [$value, $min, $max, $message]);
    }

    public static function allRange($value, $min, $max, $message = '')
    {
        return self::__callStatic('allRange', [$value, $min, $max, $message]);
    }

    public static function allNullOrRange($value, $min, $max, $message = '')
    {
        return self::__callStatic('allNullOrRange', [$value, $min, $max, $message]);
    }

    public static function nullOrOneOf($value, $values, $message = '')
    {
        return self::__callStatic('nullOrOneOf', [$value, $values, $message]);
    }

    public static function allOneOf($value, $values, $message = '')
    {
        return self::__callStatic('allOneOf', [$value, $values, $message]);
    }

    public static function allNullOrOneOf($value, $values, $message = '')
    {
        return self::__callStatic('allNullOrOneOf', [$value, $values, $message]);
    }

    public static function nullOrInArray($value, $values, $message = '')
    {
        return self::__callStatic('nullOrInArray', [$value, $values, $message]);
    }

    public static function allInArray($value, $values, $message = '')
    {
        return self::__callStatic('allInArray', [$value, $values, $message]);
    }

    public static function allNullOrInArray($value, $values, $message = '')
    {
        return self::__callStatic('allNullOrInArray', [$value, $values, $message]);
    }

    public static function nullOrContains($value, $subString, $message = '')
    {
        return self::__callStatic('nullOrContains', [$value, $subString, $message]);
    }

    public static function allContains($value, $subString, $message = '')
    {
        return self::__callStatic('allContains', [$value, $subString, $message]);
    }

    public static function allNullOrContains($value, $subString, $message = '')
    {
        return self::__callStatic('allNullOrContains', [$value, $subString, $message]);
    }

    public static function nullOrNotContains($value, $subString, $message = '')
    {
        return self::__callStatic('nullOrNotContains', [$value, $subString, $message]);
    }

    public static function allNotContains($value, $subString, $message = '')
    {
        return self::__callStatic('allNotContains', [$value, $subString, $message]);
    }

    public static function allNullOrNotContains($value, $subString, $message = '')
    {
        return self::__callStatic('allNullOrNotContains', [$value, $subString, $message]);
    }

    public static function nullOrNotWhitespaceOnly($value, $message = '')
    {
        return self::__callStatic('nullOrNotWhitespaceOnly', [$value, $message]);
    }

    public static function allNotWhitespaceOnly($value, $message = '')
    {
        return self::__callStatic('allNotWhitespaceOnly', [$value, $message]);
    }

    public static function allNullOrNotWhitespaceOnly($value, $message = '')
    {
        return self::__callStatic('allNullOrNotWhitespaceOnly', [$value, $message]);
    }

    public static function nullOrStartsWith($value, $prefix, $message = '')
    {
        return self::__callStatic('nullOrStartsWith', [$value, $prefix, $message]);
    }

    public static function allStartsWith($value, $prefix, $message = '')
    {
        return self::__callStatic('allStartsWith', [$value, $prefix, $message]);
    }

    public static function allNullOrStartsWith($value, $prefix, $message = '')
    {
        return self::__callStatic('allNullOrStartsWith', [$value, $prefix, $message]);
    }

    public static function nullOrNotStartsWith($value, $prefix, $message = '')
    {
        return self::__callStatic('nullOrNotStartsWith', [$value, $prefix, $message]);
    }

    public static function allNotStartsWith($value, $prefix, $message = '')
    {
        return self::__callStatic('allNotStartsWith', [$value, $prefix, $message]);
    }

    public static function allNullOrNotStartsWith($value, $prefix, $message = '')
    {
        return self::__callStatic('allNullOrNotStartsWith', [$value, $prefix, $message]);
    }

    public static function nullOrStartsWithLetter($value, $message = '')
    {
        return self::__callStatic('nullOrStartsWithLetter', [$value, $message]);
    }

    public static function allStartsWithLetter($value, $message = '')
    {
        return self::__callStatic('allStartsWithLetter', [$value, $message]);
    }

    public static function allNullOrStartsWithLetter($value, $message = '')
    {
        return self::__callStatic('allNullOrStartsWithLetter', [$value, $message]);
    }

    public static function nullOrEndsWith($value, $suffix, $message = '')
    {
        return self::__callStatic('nullOrEndsWith', [$value, $suffix, $message]);
    }

    public static function allEndsWith($value, $suffix, $message = '')
    {
        return self::__callStatic('allEndsWith', [$value, $suffix, $message]);
    }

    public static function allNullOrEndsWith($value, $suffix, $message = '')
    {
        return self::__callStatic('allNullOrEndsWith', [$value, $suffix, $message]);
    }

    public static function nullOrNotEndsWith($value, $suffix, $message = '')
    {
        return self::__callStatic('nullOrNotEndsWith', [$value, $suffix, $message]);
    }

    public static function allNotEndsWith($value, $suffix, $message = '')
    {
        return self::__callStatic('allNotEndsWith', [$value, $suffix, $message]);
    }

    public static function allNullOrNotEndsWith($value, $suffix, $message = '')
    {
        return self::__callStatic('allNullOrNotEndsWith', [$value, $suffix, $message]);
    }

    public static function nullOrRegex($value, $pattern, $message = '')
    {
        return self::__callStatic('nullOrRegex', [$value, $pattern, $message]);
    }

    public static function allRegex($value, $pattern, $message = '')
    {
        return self::__callStatic('allRegex', [$value, $pattern, $message]);
    }

    public static function allNullOrRegex($value, $pattern, $message = '')
    {
        return self::__callStatic('allNullOrRegex', [$value, $pattern, $message]);
    }

    public static function nullOrNotRegex($value, $pattern, $message = '')
    {
        return self::__callStatic('nullOrNotRegex', [$value, $pattern, $message]);
    }

    public static function allNotRegex($value, $pattern, $message = '')
    {
        return self::__callStatic('allNotRegex', [$value, $pattern, $message]);
    }

    public static function allNullOrNotRegex($value, $pattern, $message = '')
    {
        return self::__callStatic('allNullOrNotRegex', [$value, $pattern, $message]);
    }

    public static function nullOrUnicodeLetters($value, $message = '')
    {
        return self::__callStatic('nullOrUnicodeLetters', [$value, $message]);
    }

    public static function allUnicodeLetters($value, $message = '')
    {
        return self::__callStatic('allUnicodeLetters', [$value, $message]);
    }

    public static function allNullOrUnicodeLetters($value, $message = '')
    {
        return self::__callStatic('allNullOrUnicodeLetters', [$value, $message]);
    }

    public static function nullOrAlpha($value, $message = '')
    {
        return self::__callStatic('nullOrAlpha', [$value, $message]);
    }

    public static function allAlpha($value, $message = '')
    {
        return self::__callStatic('allAlpha', [$value, $message]);
    }

    public static function allNullOrAlpha($value, $message = '')
    {
        return self::__callStatic('allNullOrAlpha', [$value, $message]);
    }

    public static function nullOrDigits($value, $message = '')
    {
        return self::__callStatic('nullOrDigits', [$value, $message]);
    }

    public static function allDigits($value, $message = '')
    {
        return self::__callStatic('allDigits', [$value, $message]);
    }

    public static function allNullOrDigits($value, $message = '')
    {
        return self::__callStatic('allNullOrDigits', [$value, $message]);
    }

    public static function nullOrAlnum($value, $message = '')
    {
        return self::__callStatic('nullOrAlnum', [$value, $message]);
    }

    public static function allAlnum($value, $message = '')
    {
        return self::__callStatic('allAlnum', [$value, $message]);
    }

    public static function allNullOrAlnum($value, $message = '')
    {
        return self::__callStatic('allNullOrAlnum', [$value, $message]);
    }

    public static function nullOrLower($value, $message = '')
    {
        return self::__callStatic('nullOrLower', [$value, $message]);
    }

    public static function allLower($value, $message = '')
    {
        return self::__callStatic('allLower', [$value, $message]);
    }

    public static function allNullOrLower($value, $message = '')
    {
        return self::__callStatic('allNullOrLower', [$value, $message]);
    }

    public static function nullOrUpper($value, $message = '')
    {
        return self::__callStatic('nullOrUpper', [$value, $message]);
    }

    public static function allUpper($value, $message = '')
    {
        return self::__callStatic('allUpper', [$value, $message]);
    }

    public static function allNullOrUpper($value, $message = '')
    {
        return self::__callStatic('allNullOrUpper', [$value, $message]);
    }

    public static function nullOrLength($value, $length, $message = '')
    {
        return self::__callStatic('nullOrLength', [$value, $length, $message]);
    }

    public static function allLength($value, $length, $message = '')
    {
        return self::__callStatic('allLength', [$value, $length, $message]);
    }

    public static function allNullOrLength($value, $length, $message = '')
    {
        return self::__callStatic('allNullOrLength', [$value, $length, $message]);
    }

    public static function nullOrMinLength($value, $min, $message = '')
    {
        return self::__callStatic('nullOrMinLength', [$value, $min, $message]);
    }

    public static function allMinLength($value, $min, $message = '')
    {
        return self::__callStatic('allMinLength', [$value, $min, $message]);
    }

    public static function allNullOrMinLength($value, $min, $message = '')
    {
        return self::__callStatic('allNullOrMinLength', [$value, $min, $message]);
    }

    public static function nullOrMaxLength($value, $max, $message = '')
    {
        return self::__callStatic('nullOrMaxLength', [$value, $max, $message]);
    }

    public static function allMaxLength($value, $max, $message = '')
    {
        return self::__callStatic('allMaxLength', [$value, $max, $message]);
    }

    public static function allNullOrMaxLength($value, $max, $message = '')
    {
        return self::__callStatic('allNullOrMaxLength', [$value, $max, $message]);
    }

    public static function nullOrLengthBetween($value, $min, $max, $message = '')
    {
        return self::__callStatic('nullOrLengthBetween', [$value, $min, $max, $message]);
    }

    public static function allLengthBetween($value, $min, $max, $message = '')
    {
        return self::__callStatic('allLengthBetween', [$value, $min, $max, $message]);
    }

    public static function allNullOrLengthBetween($value, $min, $max, $message = '')
    {
        return self::__callStatic('allNullOrLengthBetween', [$value, $min, $max, $message]);
    }

    public static function nullOrFileExists($value, $message = '')
    {
        return self::__callStatic('nullOrFileExists', [$value, $message]);
    }

    public static function allFileExists($value, $message = '')
    {
        return self::__callStatic('allFileExists', [$value, $message]);
    }

    public static function allNullOrFileExists($value, $message = '')
    {
        return self::__callStatic('allNullOrFileExists', [$value, $message]);
    }

    public static function nullOrFile($value, $message = '')
    {
        return self::__callStatic('nullOrFile', [$value, $message]);
    }

    public static function allFile($value, $message = '')
    {
        return self::__callStatic('allFile', [$value, $message]);
    }

    public static function allNullOrFile($value, $message = '')
    {
        return self::__callStatic('allNullOrFile', [$value, $message]);
    }

    public static function nullOrDirectory($value, $message = '')
    {
        return self::__callStatic('nullOrDirectory', [$value, $message]);
    }

    public static function allDirectory($value, $message = '')
    {
        return self::__callStatic('allDirectory', [$value, $message]);
    }

    public static function allNullOrDirectory($value, $message = '')
    {
        return self::__callStatic('allNullOrDirectory', [$value, $message]);
    }

    public static function nullOrReadable($value, $message = '')
    {
        return self::__callStatic('nullOrReadable', [$value, $message]);
    }

    public static function allReadable($value, $message = '')
    {
        return self::__callStatic('allReadable', [$value, $message]);
    }

    public static function allNullOrReadable($value, $message = '')
    {
        return self::__callStatic('allNullOrReadable', [$value, $message]);
    }

    public static function nullOrWritable($value, $message = '')
    {
        return self::__callStatic('nullOrWritable', [$value, $message]);
    }

    public static function allWritable($value, $message = '')
    {
        return self::__callStatic('allWritable', [$value, $message]);
    }

    public static function allNullOrWritable($value, $message = '')
    {
        return self::__callStatic('allNullOrWritable', [$value, $message]);
    }

    public static function nullOrClassExists($value, $message = '')
    {
        return self::__callStatic('nullOrClassExists', [$value, $message]);
    }

    public static function allClassExists($value, $message = '')
    {
        return self::__callStatic('allClassExists', [$value, $message]);
    }

    public static function allNullOrClassExists($value, $message = '')
    {
        return self::__callStatic('allNullOrClassExists', [$value, $message]);
    }

    public static function nullOrSubclassOf($value, $class, $message = '')
    {
        return self::__callStatic('nullOrSubclassOf', [$value, $class, $message]);
    }

    public static function allSubclassOf($value, $class, $message = '')
    {
        return self::__callStatic('allSubclassOf', [$value, $class, $message]);
    }

    public static function allNullOrSubclassOf($value, $class, $message = '')
    {
        return self::__callStatic('allNullOrSubclassOf', [$value, $class, $message]);
    }

    public static function nullOrInterfaceExists($value, $message = '')
    {
        return self::__callStatic('nullOrInterfaceExists', [$value, $message]);
    }

    public static function allInterfaceExists($value, $message = '')
    {
        return self::__callStatic('allInterfaceExists', [$value, $message]);
    }

    public static function allNullOrInterfaceExists($value, $message = '')
    {
        return self::__callStatic('allNullOrInterfaceExists', [$value, $message]);
    }

    public static function nullOrImplementsInterface($value, $interface, $message = '')
    {
        return self::__callStatic('nullOrImplementsInterface', [$value, $interface, $message]);
    }

    public static function allImplementsInterface($value, $interface, $message = '')
    {
        return self::__callStatic('allImplementsInterface', [$value, $interface, $message]);
    }

    public static function allNullOrImplementsInterface($value, $interface, $message = '')
    {
        return self::__callStatic('allNullOrImplementsInterface', [$value, $interface, $message]);
    }

    public static function nullOrPropertyExists($classOrObject, $property, $message = '')
    {
        return self::__callStatic('nullOrPropertyExists', [$classOrObject, $property, $message]);
    }

    public static function allPropertyExists($classOrObject, $property, $message = '')
    {
        return self::__callStatic('allPropertyExists', [$classOrObject, $property, $message]);
    }

    public static function allNullOrPropertyExists($classOrObject, $property, $message = '')
    {
        return self::__callStatic('allNullOrPropertyExists', [$classOrObject, $property, $message]);
    }

    public static function nullOrPropertyNotExists($classOrObject, $property, $message = '')
    {
        return self::__callStatic('nullOrPropertyNotExists', [$classOrObject, $property, $message]);
    }

    public static function allPropertyNotExists($classOrObject, $property, $message = '')
    {
        return self::__callStatic('allPropertyNotExists', [$classOrObject, $property, $message]);
    }

    public static function allNullOrPropertyNotExists($classOrObject, $property, $message = '')
    {
        return self::__callStatic('allNullOrPropertyNotExists', [$classOrObject, $property, $message]);
    }

    public static function nullOrMethodExists($classOrObject, $method, $message = '')
    {
        return self::__callStatic('nullOrMethodExists', [$classOrObject, $method, $message]);
    }

    public static function allMethodExists($classOrObject, $method, $message = '')
    {
        return self::__callStatic('allMethodExists', [$classOrObject, $method, $message]);
    }

    public static function allNullOrMethodExists($classOrObject, $method, $message = '')
    {
        return self::__callStatic('allNullOrMethodExists', [$classOrObject, $method, $message]);
    }

    public static function nullOrMethodNotExists($classOrObject, $method, $message = '')
    {
        return self::__callStatic('nullOrMethodNotExists', [$classOrObject, $method, $message]);
    }

    public static function allMethodNotExists($classOrObject, $method, $message = '')
    {
        return self::__callStatic('allMethodNotExists', [$classOrObject, $method, $message]);
    }

    public static function allNullOrMethodNotExists($classOrObject, $method, $message = '')
    {
        return self::__callStatic('allNullOrMethodNotExists', [$classOrObject, $method, $message]);
    }

    public static function nullOrKeyExists($array, $key, $message = '')
    {
        return self::__callStatic('nullOrKeyExists', [$array, $key, $message]);
    }

    public static function allKeyExists($array, $key, $message = '')
    {
        return self::__callStatic('allKeyExists', [$array, $key, $message]);
    }

    public static function allNullOrKeyExists($array, $key, $message = '')
    {
        return self::__callStatic('allNullOrKeyExists', [$array, $key, $message]);
    }

    public static function nullOrKeyNotExists($array, $key, $message = '')
    {
        return self::__callStatic('nullOrKeyNotExists', [$array, $key, $message]);
    }

    public static function allKeyNotExists($array, $key, $message = '')
    {
        return self::__callStatic('allKeyNotExists', [$array, $key, $message]);
    }

    public static function allNullOrKeyNotExists($array, $key, $message = '')
    {
        return self::__callStatic('allNullOrKeyNotExists', [$array, $key, $message]);
    }

    public static function nullOrValidArrayKey($value, $message = '')
    {
        return self::__callStatic('nullOrValidArrayKey', [$value, $message]);
    }

    public static function allValidArrayKey($value, $message = '')
    {
        return self::__callStatic('allValidArrayKey', [$value, $message]);
    }

    public static function allNullOrValidArrayKey($value, $message = '')
    {
        return self::__callStatic('allNullOrValidArrayKey', [$value, $message]);
    }

    public static function nullOrCount($array, $number, $message = '')
    {
        return self::__callStatic('nullOrCount', [$array, $number, $message]);
    }

    public static function allCount($array, $number, $message = '')
    {
        return self::__callStatic('allCount', [$array, $number, $message]);
    }

    public static function allNullOrCount($array, $number, $message = '')
    {
        return self::__callStatic('allNullOrCount', [$array, $number, $message]);
    }

    public static function nullOrMinCount($array, $min, $message = '')
    {
        return self::__callStatic('nullOrMinCount', [$array, $min, $message]);
    }

    public static function allMinCount($array, $min, $message = '')
    {
        return self::__callStatic('allMinCount', [$array, $min, $message]);
    }

    public static function allNullOrMinCount($array, $min, $message = '')
    {
        return self::__callStatic('allNullOrMinCount', [$array, $min, $message]);
    }

    public static function nullOrMaxCount($array, $max, $message = '')
    {
        return self::__callStatic('nullOrMaxCount', [$array, $max, $message]);
    }

    public static function allMaxCount($array, $max, $message = '')
    {
        return self::__callStatic('allMaxCount', [$array, $max, $message]);
    }

    public static function allNullOrMaxCount($array, $max, $message = '')
    {
        return self::__callStatic('allNullOrMaxCount', [$array, $max, $message]);
    }

    public static function nullOrCountBetween($array, $min, $max, $message = '')
    {
        return self::__callStatic('nullOrCountBetween', [$array, $min, $max, $message]);
    }

    public static function allCountBetween($array, $min, $max, $message = '')
    {
        return self::__callStatic('allCountBetween', [$array, $min, $max, $message]);
    }

    public static function allNullOrCountBetween($array, $min, $max, $message = '')
    {
        return self::__callStatic('allNullOrCountBetween', [$array, $min, $max, $message]);
    }

    public static function nullOrIsList($array, $message = '')
    {
        return self::__callStatic('nullOrIsList', [$array, $message]);
    }

    public static function allIsList($array, $message = '')
    {
        return self::__callStatic('allIsList', [$array, $message]);
    }

    public static function allNullOrIsList($array, $message = '')
    {
        return self::__callStatic('allNullOrIsList', [$array, $message]);
    }

    public static function nullOrIsNonEmptyList($array, $message = '')
    {
        return self::__callStatic('nullOrIsNonEmptyList', [$array, $message]);
    }

    public static function allIsNonEmptyList($array, $message = '')
    {
        return self::__callStatic('allIsNonEmptyList', [$array, $message]);
    }

    public static function allNullOrIsNonEmptyList($array, $message = '')
    {
        return self::__callStatic('allNullOrIsNonEmptyList', [$array, $message]);
    }

    public static function nullOrIsMap($array, $message = '')
    {
        return self::__callStatic('nullOrIsMap', [$array, $message]);
    }

    public static function allIsMap($array, $message = '')
    {
        return self::__callStatic('allIsMap', [$array, $message]);
    }

    public static function allNullOrIsMap($array, $message = '')
    {
        return self::__callStatic('allNullOrIsMap', [$array, $message]);
    }

    public static function nullOrIsNonEmptyMap($array, $message = '')
    {
        return self::__callStatic('nullOrIsNonEmptyMap', [$array, $message]);
    }

    public static function allIsNonEmptyMap($array, $message = '')
    {
        return self::__callStatic('allIsNonEmptyMap', [$array, $message]);
    }

    public static function allNullOrIsNonEmptyMap($array, $message = '')
    {
        return self::__callStatic('allNullOrIsNonEmptyMap', [$array, $message]);
    }

    public static function nullOrUuid($value, $message = '')
    {
        return self::__callStatic('nullOrUuid', [$value, $message]);
    }

    public static function allUuid($value, $message = '')
    {
        return self::__callStatic('allUuid', [$value, $message]);
    }

    public static function allNullOrUuid($value, $message = '')
    {
        return self::__callStatic('allNullOrUuid', [$value, $message]);
    }

    public static function nullOrThrows($expression, $class = 'Exception', $message = '')
    {
        return self::__callStatic('nullOrThrows', [$expression, $class, $message]);
    }

    public static function allThrows($expression, $class = 'Exception', $message = '')
    {
        return self::__callStatic('allThrows', [$expression, $class, $message]);
    }

    public static function allNullOrThrows($expression, $class = 'Exception', $message = '')
    {
        return self::__callStatic('allNullOrThrows', [$expression, $class, $message]);
    }
}
