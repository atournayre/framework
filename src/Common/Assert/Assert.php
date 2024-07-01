<?php

declare(strict_types=1);

namespace Atournayre\Common\Assert;

use Atournayre\Primitives\Primitive;
use Webmozart\Assert\InvalidArgumentException;

/**
 * @template T
 */
final class Assert extends \Webmozart\Assert\Assert
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

        Assert::isList($array, $message);

        if (Primitive::MIXED === $classOrType) {
            return;
        }

        if (in_array($classOrType, self::$primitiveTypes, true)) {
            Assert::allIsType($array, $classOrType, $message);

            return;
        }

        Assert::allIsInstanceOf($array, $classOrType, $message);
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

        Assert::isMap($array, $message);

        if (Primitive::MIXED === $classOrType) {
            return;
        }

        if (in_array($classOrType, self::$primitiveTypes, true)) {
            Assert::allIsType($array, $classOrType, $message);

            return;
        }

        Assert::allIsInstanceOf($array, $classOrType, $message);
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
                Assert::string($value, $message);
                break;
            case Primitive::INT:
                Assert::integer($value, $message);
                break;
            case Primitive::FLOAT:
                Assert::float($value, $message);
                break;
            case Primitive::BOOL:
                Assert::boolean($value, $message);
                break;
            case Primitive::ARRAY:
                Assert::isArray($value, $message);
                break;
            case Primitive::OBJECT:
                Assert::object($value, $message);
                break;
            case Primitive::NULL:
                Assert::null($value, $message);
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
}
