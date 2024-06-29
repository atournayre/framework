<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * @template T
 * @extends \ArrayAccess<int|string, T>
 * @extends \IteratorAggregate<int|string, T>
 */
interface CollectionInterface extends \ArrayAccess, \Countable, \IteratorAggregate, \JsonSerializable
{
}
