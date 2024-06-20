<?php

declare(strict_types=1);

namespace Atournayre\Common\Assert;

use Webmozart\Assert\InvalidArgumentException;

/**
 * @template T
 */
final class Assert extends \Webmozart\Assert\Assert
{
    private const TYPE_STRING = 'string';

    private const TYPE_INT = 'int';

    private const TYPE_FLOAT = 'float';

    private const TYPE_BOOL = 'bool';

    private const TYPE_ARRAY = 'array';

    private const TYPE_NULL = 'null';

    private const TYPE_OBJECT = 'object';

    /**
     * @var array|string[]
     */
    private static array $primitiveTypes = [
        self::TYPE_STRING,
        self::TYPE_INT,
        self::TYPE_FLOAT,
        self::TYPE_BOOL,
        self::TYPE_ARRAY,
        self::TYPE_NULL,
        self::TYPE_OBJECT,
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
            case 'string':
                Assert::string($value, $message);
                break;
            case 'int':
                Assert::integer($value, $message);
                break;
            case 'float':
                Assert::float($value, $message);
                break;
            case 'bool':
                Assert::boolean($value, $message);
                break;
            case 'array':
                Assert::isArray($value, $message);
                break;
            case 'object':
                Assert::object($value, $message);
                break;
            case 'null':
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
