<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives\Collection;

use Aimeos\Map;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Exception\RuntimeException;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testAfter(): void
    {
        self::assertSame([1 => 'a'], Collection::of([0 => 'b', 1 => 'a'])->after('b')->toArray());
    }

    public function testAfterInt(): void
    {
        self::assertSame(['b' => 0], Collection::of(['a' => 1, 'b' => 0])->after(1)->toArray());
    }

    public function testAfterNone(): void
    {
        self::assertSame([], Collection::of([0 => 'b', 1 => 'a'])->after('c')->toArray());
    }

    public function testAfterCallback(): void
    {
        self::assertSame([2 => 'b'], Collection::of(['a', 'c', 'b'])->after(function ($item, $key) {
            return $item >= 'c';
        })->toArray());
    }

    public function testAll(): void
    {
        $m = Collection::of(['name' => 'Hello']);
        self::assertSame(['name' => 'Hello'], $m->all());
    }

    public function testArsortNummeric(): void
    {
        $m = Collection::of([1 => -3, 2 => -2, 3 => -4, 4 => -1, 5 => 0, 6 => 4, 7 => 3, 8 => 1, 9 => 2])->arsort();

        self::assertSame([6 => 4, 7 => 3, 9 => 2, 8 => 1, 5 => 0, 4 => -1, 2 => -2, 1 => -3, 3 => -4], $m->toArray());
    }

    public function testArsortStrings(): void
    {
        $m = Collection::of(['c' => 'bar-10', 1 => 'bar-1', 'a' => 'foo'])->arsort();

        self::assertSame(['a' => 'foo', 'c' => 'bar-10', 1 => 'bar-1'], $m->toArray());
    }

    public function testArsortStringsCase(): void
    {
        $m = Collection::of([0 => 'C', 1 => 'b']);

        self::assertSame([1 => 'b', 0 => 'C'], $m->arsort()->toArray());
        self::assertSame([0 => 'C', 1 => 'b'], $m->arsort(SORT_STRING | SORT_FLAG_CASE)->toArray());
    }

    public function testAsortNummeric(): void
    {
        $m = Collection::of([1 => -3, 2 => -2, 3 => -4, 4 => -1, 5 => 0, 6 => 4, 7 => 3, 8 => 1, 9 => 2])->asort();

        self::assertSame([3 => -4, 1 => -3, 2 => -2, 4 => -1, 5 => 0, 8 => 1, 9 => 2, 7 => 3, 6 => 4], $m->toArray());
    }

    public function testAsortStrings(): void
    {
        $m = Collection::of(['a' => 'foo', 'c' => 'bar-10', 1 => 'bar-1'])->asort();

        self::assertSame([1 => 'bar-1', 'c' => 'bar-10', 'a' => 'foo'], $m->toArray());
    }

    public function testAsortStringsCase(): void
    {
        $m = Collection::of([0 => 'C', 1 => 'b']);

        self::assertSame([0 => 'C', 1 => 'b'], $m->asort()->toArray());
        self::assertSame([1 => 'b', 0 => 'C'], $m->asort(SORT_STRING | SORT_FLAG_CASE)->toArray());
    }

    public function testAt(): void
    {
        self::assertSame(1, Collection::of([1, 3, 5])->at(0));
        self::assertSame(3, Collection::of([1, 3, 5])->at(1));
        self::assertSame(5, Collection::of([1, 3, 5])->at(-1));
        self::assertNull(Collection::of([1, 3, 5])->at(3));
    }

    public function testBefore(): void
    {
        self::assertSame([0 => 'b'], Collection::of([0 => 'b', 1 => 'a'])->before('a')->toArray());
    }

    public function testBeforeInt(): void
    {
        self::assertSame(['a' => 1], Collection::of(['a' => 1, 'b' => 0])->before(0)->toArray());
    }

    public function testBeforeNone(): void
    {
        self::assertSame([], Collection::of([0 => 'b', 1 => 'a'])->before('b')->toArray());
    }

    public function testBeforeCallback(): void
    {
        self::assertSame([0 => 'a'], Collection::of(['a', 'c', 'b'])->before(function ($item, $key) {
            return $key >= 1;
        })->toArray());
    }

    public function testBool(): void
    {
        self::assertTrue(Collection::of(['a' => true])->bool('a')->isTrue());
        self::assertTrue(Collection::of(['a' => '1'])->bool('a')->isTrue());
        self::assertTrue(Collection::of(['a' => 1.1])->bool('a')->isTrue());
        self::assertTrue(Collection::of(['a' => '10'])->bool('a')->isTrue());
        self::assertTrue(Collection::of(['a' => 'abc'])->bool('a')->isTrue());
        self::assertTrue(Collection::of(['a' => ['b' => ['c' => true]]])->bool('a/b/c')->isTrue());

        self::assertTrue(Collection::of([])->bool('b')->isFalse());
        self::assertTrue(Collection::of(['b' => ''])->bool('b')->isFalse());
        self::assertTrue(Collection::of(['b' => null])->bool('b')->isFalse());
        self::assertTrue(Collection::of(['b' => [true]])->bool('b')->isFalse());
        self::assertTrue(Collection::of(['b' => new \stdClass()])->bool('b')->isFalse());
    }

    public function testBoolClosure(): void
    {
        self::assertTrue(Collection::of([])->bool('c', function () {
            return random_int(1, 2);
        })->isTrue());
    }

    public function testBoolException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([])->bool('c', RuntimeException::new('error'));
    }

    public function testCast(): void
    {
        self::assertEquals(['1', '1', '1', 'yes'], Collection::of([true, 1, 1.0, 'yes'])->cast()->all());
        self::assertEquals([true, true, true, true], Collection::of([true, 1, 1.0, 'yes'])->cast('bool')->all());
        self::assertEquals([1, 1, 1, 0], Collection::of([true, 1, 1.0, 'yes'])->cast('int')->all());
        self::assertEquals([1.0, 1.0, 1.0, 0.0], Collection::of([true, 1, 1.0, 'yes'])->cast('float')->all());
        self::assertEquals([[], []], Collection::of([new \stdClass(), new \stdClass()])->cast('array')->all());
        self::assertEquals([new \stdClass(), new \stdClass()], Collection::of([[], []])->cast('object')->all());
    }

    public function testChunk(): void
    {
        $m = Collection::of([0, 1, 2, 3, 4]);
        self::assertSame([[0, 1, 2], [3, 4]], $m->chunk(3)->toArray());
    }

    public function testChunkException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([])->chunk(0);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testChunkKeys(): void
    {
        $m = Collection::of(['a' => 0, 'b' => 1, 'c' => 2]);
        self::assertSame([['a' => 0, 'b' => 1], ['c' => 2]], $m->chunk(2, true)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testClone(): void
    {
        $m1 = Collection::of([new \stdClass(), new \stdClass()]);
        $m2 = $m1->clone();

        self::assertCount(2, $m2->toArray());
        self::assertNotSame($m2->first(), $m1->first());
    }

    public function testCol(): void
    {
        $map = Collection::of([['foo' => 'one', 'bar' => 'two']]);
        $r = $map->col('bar');

        self::assertSame([0 => 'two'], $r->toArray());
    }

    public function testColIndex(): void
    {
        $map = Collection::of([['foo' => 'one', 'bar' => 'two']]);
        $r = $map->col('bar', 'foo');

        self::assertSame(['one' => 'two'], $r->toArray());
    }

    public function testColIndexDuplicate(): void
    {
        $map = Collection::of([['id' => 'ix', 'val' => 'v1'], ['id' => 'ix', 'val' => 'v2']]);
        $r = $map->col(null, 'id');

        self::assertSame(['ix' => ['id' => 'ix', 'val' => 'v2']], $r->toArray());
    }

    public function testColIndexNull(): void
    {
        $map = Collection::of([['bar' => 'two']]);
        $r = $map->col('bar', 'foo');

        self::assertSame(['two'], $r->toArray());
    }

    public function testColIndexOnly(): void
    {
        $map = Collection::of([['foo' => 'one', 'bar' => 'two']]);
        $r = $map->col(null, 'foo');

        self::assertSame(['one' => ['foo' => 'one', 'bar' => 'two']], $r->toArray());
    }

    public function testColRecursive(): void
    {
        $map = Collection::of([['foo' => ['bar' => 'one', 'baz' => 'two']]]);
        $r = $map->col('foo/baz', 'foo/bar');

        self::assertSame(['one' => 'two'], $r->toArray());
    }

    public function testColRecursiveNull(): void
    {
        $map = Collection::of([['foo' => ['bar' => 'one']]]);
        $r = $map->col('foo/baz', 'foo/bar');

        self::assertSame(['one' => null], $r->toArray());
    }

    public function testColRecursiveIndexNull(): void
    {
        $map = Collection::of([['foo' => ['baz' => 'two']]]);
        $r = $map->col('foo/baz', 'foo/bar');

        self::assertSame(['two'], $r->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testCollapse(): void
    {
        $m = Collection::of([0 => ['a' => 0, 'b' => 1], 1 => ['c' => 2, 'd' => 3]]);
        self::assertSame(['a' => 0, 'b' => 1, 'c' => 2, 'd' => 3], $m->collapse()->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testCollapseOverwrite(): void
    {
        $m = Collection::of([0 => ['a' => 0, 'b' => 1], 1 => ['a' => 2]]);
        self::assertSame(['a' => 2, 'b' => 1], $m->collapse()->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testCollapseRecursive(): void
    {
        $m = Collection::of([0 => [0 => 0, 1 => 1], 1 => [0 => ['a' => 2, 0 => 3], 1 => 4]]);
        self::assertSame([0 => 3, 1 => 4, 'a' => 2], $m->collapse()->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testCollapseDepth(): void
    {
        $m = Collection::of([0 => [0 => 0, 'a' => 1], 1 => [0 => ['b' => 2, 0 => 3], 1 => 4]]);
        self::assertSame([0 => ['b' => 2, 0 => 3], 'a' => 1, 1 => 4], $m->collapse(1)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testCollapseIterable(): void
    {
        $m = Collection::of([0 => [0 => 0, 'a' => 1], 1 => Collection::of([0 => ['b' => 2, 0 => 3], 1 => 4])->toArray()]);
        self::assertSame([0 => 3, 'a' => 1, 'b' => 2, 1 => 4], $m->collapse()->toArray());
    }

    public function testCollapseException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([])->collapse(-1);
    }

    public function testCombine(): void
    {
        $r = Collection::of(['name', 'age'])->combine(['Tom', 29]);
        self::assertSame(['name' => 'Tom', 'age' => 29], $r->toArray());
    }

    public function testCompare(): void
    {
        self::assertTrue(Collection::of(['foo', 'bar'])->compare('foo')->isTrue());
        self::assertTrue(Collection::of(['foo', 'bar'])->compare('Foo', false)->isTrue());
        self::assertTrue(Collection::of([123, 12.3])->compare('12.3')->isTrue());
        self::assertTrue(Collection::of([false, true])->compare('1')->isTrue());
        self::assertTrue(Collection::of(['foo', 'bar'])->compare('Foo')->isFalse());
        self::assertTrue(Collection::of(['foo', 'bar'])->compare('baz')->isFalse());
        self::assertTrue(Collection::of([new \stdClass(), 'bar'])->compare('foo')->isFalse());
    }

    public function testConcatWithArray(): void
    {
        $first = Collection::of([1, 2]);
        $r = $first->concat(['a', 'b'])->concat(['x' => 'foo', 'y' => 'bar']);

        self::assertSame([1, 2, 'a', 'b', 'foo', 'bar'], $r->toArray());
    }

    public function testConcatMap(): void
    {
        $first = Collection::of([1, 2]);
        $second = Collection::of(['a', 'b']);
        $third = Collection::of(['x' => 'foo', 'y' => 'bar']);

        $r = $first->concat($second)->concat($third);

        self::assertSame([1, 2, 'a', 'b', 'foo', 'bar'], $r->toArray());
    }

    public function testConstruct(): void
    {
        $map = Collection::of([]);
        self::assertEmpty($map->toArray());
    }

    public function testConstructMap(): void
    {
        $firstMap = Collection::of(['foo' => 'bar']);
        $secondMap = Collection::of($firstMap);

        self::assertSame(['foo' => 'bar'], $secondMap->toArray());
    }

    public function testConstructArray(): void
    {
        $map = Collection::of(['foo' => 'bar']);

        self::assertSame(['foo' => 'bar'], $map->toArray());
    }

    public function testContains(): void
    {
        self::assertTrue(Collection::of(['a', 'b'])->contains('a')->isTrue());
        self::assertTrue(Collection::of(['a', 'b'])->contains(['a', 'c'])->isTrue());
        self::assertTrue(Collection::of(['a', 'b'])->some(function ($item, $key) {
            return 'a' === $item;
        })->isTrue());
    }

    public function testContainsWhere(): void
    {
        self::assertTrue(Collection::of([['type' => 'name']])->contains('type', 'name')->isTrue());
        self::assertTrue(Collection::of([['type' => 'name']])->contains('type', '==', 'name')->isTrue());
        self::assertTrue(Collection::of([['type' => 'name']])->contains('type', '!=', 'name')->isFalse());
    }

    public function testCopy(): void
    {
        $m1 = Collection::of(['foo', 'bar']);
        $m2 = $m1->copy();

        self::assertCount(2, $m2->toArray());
    }

    public function testCountBy(): void
    {
        $r = Collection::of([1, 'foo', 2, 'foo', 1])->countBy();

        self::assertSame([1 => 2, 'foo' => 2, 2 => 1], $r->toArray());
    }

    public function testCountByCallback(): void
    {
        $r = Collection::of(['a@gmail.com', 'b@yahoo.com', 'c@gmail.com'])->countBy(function ($email) {
            return substr((string) strrchr($email, '@'), 1);
        });

        self::assertSame(['gmail.com' => 2, 'yahoo.com' => 1], $r->toArray());
    }

    public function testCountByFloat(): void
    {
        $r = Collection::of([1.11, 3.33, 3.33, 9.99])->countBy();

        self::assertSame(['1.11' => 1, '3.33' => 2, '9.99' => 1], $r->toArray());
    }

    public function testDiff(): void
    {
        $m = Collection::of(['id' => 1, 'first_word' => 'Hello']);
        $r = $m->diff(Collection::of(['first_word' => 'Hello', 'last_word' => 'World']));

        self::assertSame(['id' => 1], $r->toArray());
    }

    public function testDiffUsingWithMap(): void
    {
        $m = Collection::of(['en_GB', 'fr', 'HR']);
        $r = $m->diff(Collection::of(['en_gb', 'hr']));

        // demonstrate that diffKeys wont support case insensitivity
        self::assertSame(['en_GB', 'fr', 'HR'], $r->values()->toArray());
    }

    public function testDiffCallback(): void
    {
        $m1 = Collection::of(['a' => 'green', 'b' => 'brown', 'c' => 'blue', 'red']);
        $m2 = Collection::of(['A' => 'Green', 'yellow', 'red']);
        $r1 = $m1->diff($m2);
        $r2 = $m1->diff($m2, 'strcasecmp');

        // demonstrate that the case of the keys will affect the output when diff is used
        self::assertSame(['a' => 'green', 'b' => 'brown', 'c' => 'blue'], $r1->toArray());

        // allow for case insensitive difference
        self::assertSame(['b' => 'brown', 'c' => 'blue'], $r2->toArray());
    }

    public function testDiffAssoc(): void
    {
        $m1 = Collection::of(['id' => 1, 'first_word' => 'Hello', 'not_affected' => 'value']);
        $m2 = Collection::of(['id' => 123, 'foo_bar' => 'Hello', 'not_affected' => 'value']);
        $r = $m1->diffAssoc($m2);

        self::assertSame(['id' => 1, 'first_word' => 'Hello'], $r->toArray());
    }

    public function testDiffAssocCallback(): void
    {
        $m1 = Collection::of(['a' => 'green', 'b' => 'brown', 'c' => 'blue', 'red']);
        $m2 = Collection::of(['A' => 'green', 'yellow', 'red']);
        $r1 = $m1->diffAssoc($m2);
        $r2 = $m1->diffAssoc($m2, 'strcasecmp');

        // demonstrate that the case of the keys will affect the output when diffAssoc is used
        self::assertSame(['a' => 'green', 'b' => 'brown', 'c' => 'blue', 'red'], $r1->toArray());

        // allow for case insensitive difference
        self::assertSame(['b' => 'brown', 'c' => 'blue', 'red'], $r2->toArray());
    }

    public function testDiffKeys(): void
    {
        $m1 = Collection::of(['id' => 1, 'first_word' => 'Hello']);
        $m2 = Collection::of(['id' => 123, 'foo_bar' => 'Hello']);
        $r = $m1->diffKeys($m2);

        self::assertSame(['first_word' => 'Hello'], $r->toArray());
    }

    public function testDiffKeysCallback(): void
    {
        $m1 = Collection::of(['id' => 1, 'first_word' => 'Hello']);
        $m2 = Collection::of(['ID' => 123, 'foo_bar' => 'Hello']);
        $r1 = $m1->diffKeys($m2);
        $r2 = $m1->diffKeys($m2, 'strcasecmp');

        // demonstrate that diffKeys wont support case insensitivity
        self::assertSame(['id' => 1, 'first_word' => 'Hello'], $r1->toArray());

        // allow for case insensitive difference
        self::assertSame(['first_word' => 'Hello'], $r2->toArray());
    }

    public function testDump(): void
    {
        $r = Collection::of(['a' => 'foo', 'b' => 'bar'])
            ->dump()
            ->sort()
            ->dump('print_r')
        ;

        $this->expectOutputString('Array
(
    [a] => foo
    [b] => bar
)
Array
(
    [0] => bar
    [1] => foo
)
');
    }

    public function testDuplicates(): void
    {
        $r = Collection::of([1, 2, '1', 3])->duplicates();

        self::assertSame([2 => '1'], $r->toArray());
    }

    public function testDuplicatesColumn(): void
    {
        $r = Collection::of([['p' => '1'], ['p' => 1], ['p' => 2]])->duplicates('p');

        self::assertSame([1 => ['p' => 1]], $r->toArray());
    }

    public function testDuplicatesPath(): void
    {
        $r = Collection::of([['i' => ['p' => '1']], ['i' => ['p' => 1]]])->duplicates('i/p');

        self::assertSame([1 => ['i' => ['p' => 1]]], $r->toArray());
    }

    public function testEach(): void
    {
        $m = Collection::of($original = [1, 2, 'foo' => 'bar', 'bam' => 'baz']);

        $result = [];
        $r = $m->each(function ($item, $key) use (&$result) {
            $result[$key] = $item;
        });

        self::assertSame($original, $result);
    }

    public function testEachFalse(): void
    {
        $m = Collection::of([1, 2, 'foo' => 'bar', 'bam' => 'baz']);

        $result = [];
        $m->each(function ($item, $key) use (&$result) {
            $result[$key] = $item;
            if (is_string($key)) {
                return false;
            }
        });

        self::assertSame([1, 2, 'foo' => 'bar'], $result);
    }

    public function testEmpty(): void
    {
        $m = Collection::of([]);
        self::assertTrue($m->empty()->isTrue());
    }

    public function testEmptyFalse(): void
    {
        $m = Collection::of(['foo']);
        self::assertTrue($m->empty()->isFalse());
    }

    public function testEquals(): void
    {
        $map = Collection::of(['foo' => 'one', 'bar' => 'two']);

        self::assertTrue($map->equals(['foo' => 'one', 'bar' => 'two'])->isTrue());
        self::assertTrue($map->equals(['bar' => 'two', 'foo' => 'one'])->isTrue());
    }

    public function testEqualsTypes(): void
    {
        $map = Collection::of(['foo' => 1, 'bar' => '2']);

        self::assertTrue($map->equals(['foo' => '1', 'bar' => 2])->isTrue());
        self::assertTrue($map->equals(['bar' => 2, 'foo' => '1'])->isTrue());
    }

    public function testEqualsNoKeys(): void
    {
        $map = Collection::of(['foo' => 'one', 'bar' => 'two']);

        self::assertTrue($map->equals([0 => 'one', 1 => 'two'])->isTrue());
        self::assertTrue($map->equals([0 => 'two', 1 => 'one'])->isTrue());
    }

    public function testEqualsLess(): void
    {
        $map = Collection::of(['foo' => 'one', 'bar' => 'two']);
        self::assertTrue($map->equals(['foo' => 'one'])->isFalse());
    }

    public function testEqualsLessKeys(): void
    {
        $map = Collection::of(['foo' => 'one', 'bar' => 'two']);
        self::assertTrue($map->equals(['foo' => 'one'])->isFalse());
    }

    public function testEqualsMore(): void
    {
        $map = Collection::of(['foo' => 'one', 'bar' => 'two']);
        self::assertTrue($map->equals(['foo' => 'one', 'bar' => 'two', 'baz' => 'three'])->isFalse());
    }

    public function testEvery(): void
    {
        self::assertTrue(Collection::of([0 => 'a', 1 => 'b'])->every(function ($value, $key) {
            return is_string($value);
        })->isTrue());

        self::assertTrue(Collection::of([0 => 'a', 1 => 100])->every(function ($value, $key) {
            return is_string($value);
        })->isFalse());
    }

    public function testExcept(): void
    {
        self::assertSame(['a' => 1, 'c' => 3], Collection::of(['a' => 1, 'b' => 2, 'c' => 3])->except('b')->toArray());
        self::assertSame([2 => 'b'], Collection::of([1 => 'a', 2 => 'b', 3 => 'c'])->except([1, 3])->toArray());
    }

    public function testExplode(): void
    {
        $map = Collection::explode(',', 'a,b,c');

        self::assertSame(['a', 'b', 'c'], $map->toArray());
    }

    public function testExplodeString(): void
    {
        $map = Collection::explode('<-->', 'a a<-->b b<-->c c');

        self::assertSame(['a a', 'b b', 'c c'], $map->toArray());
    }

    public function testExplodeSplit(): void
    {
        $map = Collection::explode('', 'string');

        self::assertSame(['s', 't', 'r', 'i', 'n', 'g'], $map->toArray());
    }

    public function testExplodeSplitSize(): void
    {
        $map = Collection::explode('', 'string', 6);

        self::assertSame(['s', 't', 'r', 'i', 'n', 'g'], $map->toArray());
    }

    public function testExplodeLength(): void
    {
        $map = Collection::explode('|', 'a|b|c', 2);

        self::assertSame(['a', 'b|c'], $map->toArray());
    }

    public function testExplodeSplitLength(): void
    {
        $map = Collection::explode('', 'string', 2);

        self::assertSame(['s', 't', 'ring'], $map->toArray());
    }

    public function testExplodeNegativeLength(): void
    {
        $map = Collection::explode('|', 'a|b|c|d', -2);

        self::assertSame(['a', 'b'], $map->toArray());
    }

    public function testExplodeSplitNegativeLength(): void
    {
        $map = Collection::explode('', 'string', -3);

        self::assertSame(['s', 't', 'r'], $map->toArray());
    }

    public function testFilter(): void
    {
        $m = Collection::of([['id' => 1, 'name' => 'Hello'], ['id' => 2, 'name' => 'World']]);

        self::assertSame([1 => ['id' => 2, 'name' => 'World']], $m->filter(function ($item) {
            return 2 == $item['id'];
        })->toArray());
    }

    public function testFilterNoCallback(): void
    {
        $m = Collection::of(['', 'Hello', '', 'World']);
        $r = $m->filter();

        self::assertSame(['Hello', 'World'], $r->values()->toArray());
    }

    public function testFilterRemove(): void
    {
        $m = Collection::of(['id' => 1, 'first' => 'Hello', 'second' => 'World']);

        self::assertSame(['first' => 'Hello', 'second' => 'World'], $m->filter(function ($item, $key) {
            return 'id' != $key;
        })->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFind(): void
    {
        $m = Collection::of(['foo', 'bar', 'baz', 'boo']);
        $result = $m->find(function ($value, $key) {
            return BoolEnum::fromBool((bool) strncmp($value, 'ba', 2))
                ->isFalse()
            ;
        });
        self::assertSame('bar', $result);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFindLast(): void
    {
        $m = Collection::of(['foo', 'bar', 'baz', 'boo']);
        $result = $m->find(function ($value, $key) {
            return BoolEnum::fromBool((bool) strncmp($value, 'ba', 2))
                ->isFalse()
            ;
        }, null, true);
        self::assertSame('baz', $result);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFindDefault(): void
    {
        $m = Collection::of(['foo', 'bar', 'baz']);
        $result = $m->find(function ($value) {
            return false;
        }, 'none');
        self::assertSame('none', $result);
    }

    public function testFindException(): void
    {
        $m = Collection::of(['foo', 'bar', 'baz']);

        $this->expectException(ThrowableInterface::class);

        $m->find(function ($value) {
            return false;
        }, RuntimeException::new('error'));
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFirst(): void
    {
        $m = Collection::of(['foo', 'bar']);
        self::assertSame('foo', $m->first());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFirstWithDefault(): void
    {
        $m = Collection::of([]);
        $result = $m->first('default');
        self::assertSame('default', $result);
    }

    public function testFirstWithException(): void
    {
        $m = Collection::of([]);

        $this->expectException(ThrowableInterface::class);
        $result = $m->first(RuntimeException::new('error'));
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFirstWithClosure(): void
    {
        $m = Collection::of([]);
        $result = $m->first(function () { return random_int(10, 11); });

        self::assertGreaterThanOrEqual(10, $result);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFirstKey(): void
    {
        self::assertSame('a', Collection::of(['a' => 1, 'b' => 2])->firstKey());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFirstKeyEmpty(): void
    {
        self::assertNull(Collection::of()->firstKey());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFlat(): void
    {
        $m = Collection::of([[0, 1], [2, 3]]);
        self::assertSame([0, 1, 2, 3], $m->flat()->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFlatNone(): void
    {
        $m = Collection::of([[0, 1], [2, 3]]);
        self::assertSame([[0, 1], [2, 3]], $m->flat(0)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFlatRecursive(): void
    {
        $m = Collection::of([[0, 1], [[2, 3], 4]]);
        self::assertSame([0, 1, 2, 3, 4], $m->flat()->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFlatDepth(): void
    {
        $m = Collection::of([[0, 1], [[2, 3], 4]]);
        self::assertSame([0, 1, [2, 3], 4], $m->flat(1)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFlatTraversable(): void
    {
        $m = Collection::of([[0, 1], Collection::of([[2, 3], 4])->toArray()]);
        self::assertSame([0, 1, 2, 3, 4], $m->flat()->toArray());
    }

    public function testFlatException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([])->flat(-1);
    }

    public function testFlip(): void
    {
        $m = Collection::of(['a' => 'X', 'b' => 'Y']);
        self::assertSame(['X' => 'a', 'Y' => 'b'], $m->flip()->toArray());
    }

    public function testFloat(): void
    {
        self::assertSame(1.0, Collection::of(['a' => true])->float('a')->value());
        self::assertSame(1.0, Collection::of(['a' => 1])->float('a')->value());
        self::assertSame(1.1, Collection::of(['a' => '1.1'])->float('a')->value());
        self::assertSame(10.0, Collection::of(['a' => '10'])->float('a')->value());
        self::assertSame(1.1, Collection::of(['a' => ['b' => ['c' => 1.1]]])->float('a/b/c')->value());
        self::assertSame(1.1, Collection::of([])->float('a', 1.1)->value());

        self::assertSame(0.0, Collection::of([])->float('b')->value());
        self::assertSame(0.0, Collection::of(['b' => ''])->float('b')->value());
        self::assertSame(0.0, Collection::of(['a' => 'abc'])->float('a')->value());
        self::assertSame(0.0, Collection::of(['b' => null])->float('b')->value());
        self::assertSame(0.0, Collection::of(['b' => [true]])->float('b')->value());
        self::assertSame(0.0, Collection::of(['b' => new \stdClass()])->float('b')->value());
    }

    public function testFloatClosure(): void
    {
        self::assertSame(1.1, Collection::of([])->float('c', function () { return 1.1; })->value());
    }

    public function testFloatException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([])->float('c', RuntimeException::new('error'));
    }

    public function testFromNull(): void
    {
        $m = Collection::of(null);

        self::assertSame([], $m->toArray());
    }

    public function testFromValue(): void
    {
        $m = Collection::of('a');

        self::assertSame([0 => 'a'], $m->toArray());
    }

    public function testFromMap(): void
    {
        $firstMap = Collection::of(['foo' => 'bar']);
        $secondMap = Collection::of($firstMap);

        self::assertSame($firstMap, $secondMap);
    }

    public function testFromArray(): void
    {
        $map = Collection::of(['foo' => 'bar']);

        self::assertSame(['foo' => 'bar'], $map->toArray());
    }

    public function testGet(): void
    {
        $map = Collection::of(['a' => 1, 'b' => 2, 'c' => 3]);
        self::assertSame(2, $map->get('b'));
    }

    public function testGetPath(): void
    {
        self::assertSame('Y', Collection::of(['a' => ['b' => ['c' => 'Y']]])->get('a/b/c'));
    }

    public function testGetPathObject(): void
    {
        $obj = new \stdClass();
        $obj->b = 'X';

        self::assertSame('X', Collection::of(['a' => $obj])->get('a/b'));
    }

    /**
     * @throws ThrowableInterface
     */
    public function testGetWithNull(): void
    {
        $map = Collection::of([1, 2, 3]);
        self::assertNull($map->get('a'));
    }

    public function testGetWithException(): void
    {
        $m = Collection::of([]);

        $this->expectException(ThrowableInterface::class);
        $m->get('Y', RuntimeException::new('error'));
    }

    /**
     * @throws ThrowableInterface
     */
    public function testGetWithClosure(): void
    {
        $m = Collection::of([]);
        $result = $m->get(1, function () { return random_int(10, 11); });

        self::assertGreaterThanOrEqual(10, $result);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testGrep(): void
    {
        $r = Collection::of(['ab', 'bc', 'cd'])->grep('/b/');

        self::assertSame(['ab', 'bc'], $r->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testGrepInvert(): void
    {
        $r = Collection::of(['ab', 'bc', 'cd'])->grep('/a/', PREG_GREP_INVERT);

        self::assertSame([1 => 'bc', 2 => 'cd'], $r->toArray());
    }

    public function testGrepException(): void
    {
        set_error_handler(function ($errno, $str, $file, $line) { return true; });

        $this->expectException(ThrowableInterface::class);
        Collection::of([])->grep('b');
    }

    /**
     * @throws ThrowableInterface
     */
    public function testGrepNumbers(): void
    {
        $r = Collection::of([1.5, 0, 0.0, 'a'])->grep('/^(\d+)?\.\d+$/');

        self::assertSame([1.5], $r->toArray());
    }

    public function testGroupBy(): void
    {
        $list = [
            10 => ['aid' => 123, 'code' => 'x-abc'],
            20 => ['aid' => 123, 'code' => 'x-def'],
            30 => ['aid' => 456, 'code' => 'x-def'],
        ];
        $expected = [
            123 => [10 => ['aid' => 123, 'code' => 'x-abc'], 20 => ['aid' => 123, 'code' => 'x-def']],
            456 => [30 => ['aid' => 456, 'code' => 'x-def']],
        ];

        $r = Collection::of($list)->groupBy('aid');

        self::assertSame($expected, $r->toArray());
    }

    public function testGroupByCallback(): void
    {
        $list = [
            10 => ['aid' => 123, 'code' => 'x-abc'],
            20 => ['aid' => 123, 'code' => 'x-def'],
            30 => ['aid' => 456, 'code' => 'x-def'],
        ];
        $expected = [
            'abc' => [10 => ['aid' => 123, 'code' => 'x-abc']],
            'def' => [20 => ['aid' => 123, 'code' => 'x-def'], 30 => ['aid' => 456, 'code' => 'x-def']],
        ];

        $r = Collection::of($list)->groupBy(function ($item, $key) {
            return substr($item['code'], -3);
        });

        self::assertSame($expected, $r->toArray());
    }

    public function testGroupByInvalid(): void
    {
        $list = [
            10 => ['aid' => 123, 'code' => 'x-abc'],
            20 => ['aid' => 123, 'code' => 'x-def'],
            30 => ['aid' => 456, 'code' => 'x-def'],
        ];
        $expected = [
            '' => [
                10 => ['aid' => 123, 'code' => 'x-abc'],
                20 => ['aid' => 123, 'code' => 'x-def'],
                30 => ['aid' => 456, 'code' => 'x-def'],
            ],
        ];

        $r = Collection::of($list)->groupBy('xid');

        self::assertSame($expected, $r->toArray());
    }

    public function testGroupByObject(): void
    {
        $list = [
            10 => (object) ['aid' => 123, 'code' => 'x-abc'],
            20 => (object) ['aid' => 123, 'code' => 'x-def'],
            30 => (object) ['aid' => 456, 'code' => 'x-def'],
        ];
        $expected = [
            123 => [10 => (object) ['aid' => 123, 'code' => 'x-abc'], 20 => (object) ['aid' => 123, 'code' => 'x-def']],
            456 => [30 => (object) ['aid' => 456, 'code' => 'x-def']],
        ];

        $r = Collection::of($list)->groupBy('aid');

        self::assertEquals($expected, $r->toArray());
    }

    public function testHas(): void
    {
        $m = Collection::of(['id' => 1, 'first' => 'Hello', 'second' => 'World']);

        self::assertTrue($m->has('first')->asBool());
        self::assertFalse($m->has('third')->asBool());
    }

    public function testHasMultiple(): void
    {
        $m = Collection::of(['id' => 1, 'first' => 'Hello', 'second' => 'World']);

        self::assertTrue($m->has(['first', 'second'])->asBool());
        self::assertFalse($m->has(['first', 'third'])->asBool());
    }

    public function testHasPath(): void
    {
        $m = Collection::of(['a' => ['b' => ['c' => 'Y']]]);

        self::assertTrue($m->has('a/b/c')->asBool());
        self::assertFalse($m->has('a/b/c/d')->asBool());
        self::assertTrue($m->has(['a', 'a/b', 'a/b/c'])->asBool());
        self::assertFalse($m->has(['a', 'a/b', 'a/b/c', 'a/b/c/d'])->asBool());
    }

    public function testIf(): void
    {
        $r = Collection::of(['a'])->if(
            true,
            function (Map $_) { return ['b']; }
        );

        self::assertSame(['b'], $r->all());
    }

    public function testIfThen(): void
    {
        $r = Collection::of(['a'])->if(
            function (Map $map) { return $map->in('a'); },
            function (Map $_) { },
            function (Map $_) { self::fail(); }
        );

        self::assertSame([], $r->all());
    }

    public function testIfElse(): void
    {
        $r = Collection::of(['a'])->if(
            function (Map $map) { return $map->in('c'); },
            function (Map $_) { self::fail(); },
            function (Map $_) { }
        );

        self::assertSame([], $r->all());
    }

    public function testIfTrue(): void
    {
        $r = Collection::of(['a', 'b'])->if(true, function ($map) {
            return $map->push('c');
        });

        self::assertSame(['a', 'b', 'c'], $r->all());
    }

    public function testIfFalse(): void
    {
        $r = Collection::of(['a', 'b'])->if(false, null, function ($map) {
            return $map->pop();
        });

        self::assertSame(['b'], $r->all());
    }

    public function testIfAny(): void
    {
        $r = Collection::of(['a'])->ifAny(
            function (Map $_) { return ['b']; }
        );

        self::assertSame(['b'], $r->all());
    }

    public function testIfAnyFalse(): void
    {
        $r = Collection::of([])->ifAny(
            function (Map $m) { return $m->push('b'); },
            function (Map $m) { return $m->push('c'); }
        );

        self::assertSame(['c'], $r->all());
    }

    public function testIfAnyNone(): void
    {
        $r = Collection::of(['a'])->ifAny();

        self::assertSame(['a'], $r->all());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testImplements(): void
    {
        self::assertFalse(Collection::of([Collection::of(), new \stdClass()])->implements('\Countable')->asBool());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testImplementsException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([Collection::of(), 123])->implements('\Countable', true);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testImplementsCustomException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([Collection::of(), 123])->implements('\Countable', ThrowableInterface::class);
    }

    public function testIn(): void
    {
        self::assertTrue(Collection::of(['a', 'b'])->in('a')->asBool());
        self::assertTrue(Collection::of(['a', 'b'])->in(['a', 'b'])->asBool());
        self::assertFalse(Collection::of(['a', 'b'])->in('x')->asBool());
        self::assertFalse(Collection::of(['a', 'b'])->in(['a', 'x'])->asBool());
        self::assertFalse(Collection::of(['1', '2'])->in(2, true)->asBool());
    }

    public function testIncludes(): void
    {
        self::assertTrue(Collection::of(['a', 'b'])->includes('a')->asBool());
        self::assertFalse(Collection::of(['a', 'b'])->includes('x')->asBool());
    }

    public function testIndex(): void
    {
        $m = Collection::of([4 => 'a', 8 => 'b']);

        self::assertSame(1, $m->index('8'));
    }

    public function testIndexClosure(): void
    {
        $m = Collection::of([4 => 'a', 8 => 'b']);

        self::assertSame(1, $m->index(function ($key) {
            return '8' == $key;
        }));
    }

    public function testIndexNotFound(): void
    {
        $m = Collection::of([]);

        self::assertNull($m->index('b'));
    }

    public function testIndexNotFoundClosure(): void
    {
        $m = Collection::of([]);

        self::assertNull($m->index(function ($key) {
            return false;
        }));
    }

    public function testInsertAfter(): void
    {
        $r = Collection::of(['a' => 'foo', 'b' => 'bar'])->insertAfter('foo', 'baz');

        self::assertSame(['a' => 'foo', 0 => 'baz', 'b' => 'bar'], $r->toArray());
    }

    public function testInsertAfterArray(): void
    {
        $r = Collection::of(['foo', 'bar'])->insertAfter('foo', ['baz', 'boo']);

        self::assertSame(['foo', 'baz', 'boo', 'bar'], $r->toArray());
    }

    public function testInsertAfterEnd(): void
    {
        $r = Collection::of(['foo', 'bar'])->insertAfter(null, 'baz');

        self::assertSame(['foo', 'bar', 'baz'], $r->toArray());
    }

    public function testInsertAt(): void
    {
        $r = Collection::of(['a' => 'foo', 'b' => 'bar'])->insertAt(1, 'baz', 'c');

        self::assertSame(['a' => 'foo', 'c' => 'baz', 'b' => 'bar'], $r->toArray());
    }

    public function testInsertAtBegin(): void
    {
        $r = Collection::of(['a' => 'foo', 'b' => 'bar'])->insertAt(0, 'baz');

        self::assertSame([0 => 'baz', 'a' => 'foo', 'b' => 'bar'], $r->toArray());
    }

    public function testInsertAtEnd(): void
    {
        $r = Collection::of(['a' => 'foo', 'b' => 'bar'])->insertAt(5, 'baz');

        self::assertSame(['a' => 'foo', 'b' => 'bar', 0 => 'baz'], $r->toArray());
    }

    public function testInsertAtNegative(): void
    {
        $r = Collection::of(['a' => 'foo', 'b' => 'bar'])->insertAt(-1, 'baz');

        self::assertSame(['a' => 'foo', 0 => 'baz', 'b' => 'bar'], $r->toArray());
    }

    public function testInsertAtNegativeKey(): void
    {
        $r = Collection::of(['a' => 'foo', 'b' => 'bar'])->insertAt(-1, 'baz', 'c');

        self::assertSame(['a' => 'foo', 'c' => 'baz', 'b' => 'bar'], $r->toArray());
    }

    public function testInsertBefore(): void
    {
        $r = Collection::of(['a' => 'foo', 'b' => 'bar'])->insertBefore('bar', 'baz');

        self::assertSame(['a' => 'foo', 0 => 'baz', 'b' => 'bar'], $r->toArray());
    }

    public function testInsertBeforeArray(): void
    {
        $r = Collection::of(['foo', 'bar'])->insertBefore('bar', ['baz', 'boo']);

        self::assertSame(['foo', 'baz', 'boo', 'bar'], $r->toArray());
    }

    public function testInsertBeforeEnd(): void
    {
        $r = Collection::of(['foo', 'bar'])->insertBefore(null, 'baz');

        self::assertSame(['foo', 'bar', 'baz'], $r->toArray());
    }

    public function testInt(): void
    {
        self::assertEquals(1, Collection::of(['a' => true])->int('a')->value());
        self::assertEquals(1, Collection::of(['a' => '1'])->int('a')->value());
        self::assertEquals(1, Collection::of(['a' => 1.1])->int('a')->value());
        self::assertEquals(10, Collection::of(['a' => '10'])->int('a')->value());
        self::assertEquals(1, Collection::of(['a' => ['b' => ['c' => 1]]])->int('a/b/c')->value());
        self::assertEquals(1, Collection::of([])->int('a', 1)->value());

        self::assertEquals(0, Collection::of([])->int('b')->value());
        self::assertEquals(0, Collection::of(['b' => ''])->int('b')->value());
        self::assertEquals(0, Collection::of(['b' => 'abc'])->int('b')->value());
        self::assertEquals(0, Collection::of(['b' => null])->int('b')->value());
        self::assertEquals(0, Collection::of(['b' => [true]])->int('b')->value());
        self::assertEquals(0, Collection::of(['b' => new \stdClass()])->int('b')->value());
    }

    public function testIntClosure(): void
    {
        self::assertEquals(1, Collection::of([])->int('c', function () { return random_int(1, 1); })->value());
    }

    public function testIntException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([])->int('c', RuntimeException::new('error'));
    }

    public function testIntersect(): void
    {
        $m = Collection::of(['id' => 1, 'first_word' => 'Hello']);
        $i = Collection::of(['first_world' => 'Hello', 'last_word' => 'World']);
        $r = $m->intersect($i);

        self::assertSame(['first_word' => 'Hello'], $r->toArray());
    }

    public function testIntersectCallback(): void
    {
        $m = Collection::of(['id' => 1, 'first_word' => 'Hello', 'last_word' => 'World']);
        $i = Collection::of(['first_world' => 'Hello', 'last_world' => 'world']);
        $r = $m->intersect($i, 'strcasecmp');

        self::assertSame(['first_word' => 'Hello', 'last_word' => 'World'], $r->toArray());
    }

    public function testIntersectAssoc(): void
    {
        $m = Collection::of(['id' => 1, 'name' => 'Mateus', 'age' => 18]);
        $i = Collection::of(['name' => 'Mateus', 'firstname' => 'Mateus']);
        $r = $m->intersectAssoc($i);

        self::assertSame(['name' => 'Mateus'], $r->toArray());
    }

    public function testIntersectAssocCallback(): void
    {
        $m = Collection::of(['id' => 1, 'first_word' => 'Hello', 'last_word' => 'World']);
        $i = Collection::of(['first_word' => 'hello', 'Last_word' => 'world']);
        $r = $m->intersectAssoc($i, 'strcasecmp');

        self::assertSame(['first_word' => 'Hello'], $r->toArray());
    }

    public function testIntersectKeys(): void
    {
        $m = Collection::of(['id' => 1, 'name' => 'Mateus', 'age' => 18]);
        $i = Collection::of(['name' => 'Mateus', 'surname' => 'Guimaraes']);
        $r = $m->intersectKeys($i);

        self::assertSame(['name' => 'Mateus'], $r->toArray());
    }

    public function testIntersectKeysCallback(): void
    {
        $m = Collection::of(['id' => 1, 'first_word' => 'Hello', 'last_word' => 'World']);
        $i = Collection::of(['First_word' => 'Hello', 'last_word' => 'world']);
        $r = $m->intersectKeys($i, 'strcasecmp');

        self::assertSame(['first_word' => 'Hello', 'last_word' => 'World'], $r->toArray());
    }

    public function testIs(): void
    {
        $map = Collection::of(['foo' => 1, 'bar' => 2]);

        self::assertTrue($map->is(['foo' => 1, 'bar' => 2])->asBool());
        self::assertTrue($map->is(['bar' => 2, 'foo' => 1])->asBool());
        self::assertTrue($map->is(['foo' => '1', 'bar' => '2'])->asBool());
    }

    public function testIsStrict(): void
    {
        $map = Collection::of(['foo' => 1, 'bar' => 2]);

        self::assertTrue($map->is(['foo' => 1, 'bar' => 2], true)->asBool());
        self::assertFalse($map->is(['bar' => 2, 'foo' => 1], true)->asBool());
        self::assertFalse($map->is(['foo' => '1', 'bar' => '2'], true)->asBool());
    }

    public function testIsEmpty(): void
    {
        $m = Collection::of([]);
        self::assertTrue($m->isEmpty()->asBool());
    }

    public function testIsEmptyFalse(): void
    {
        $m = Collection::of(['foo']);
        self::assertFalse($m->isEmpty()->asBool());
    }

    public function testIsNumeric(): void
    {
        self::assertTrue(Collection::of([])->isNumeric()->asBool());
        self::assertTrue(Collection::of([1])->isNumeric()->asBool());
        self::assertTrue(Collection::of([1.1])->isNumeric()->asBool());
        self::assertTrue(Collection::of([010])->isNumeric()->asBool());
        self::assertTrue(Collection::of([0x10])->isNumeric()->asBool());
        self::assertTrue(Collection::of([0b10])->isNumeric()->asBool());
        self::assertTrue(Collection::of(['010'])->isNumeric()->asBool());
        self::assertTrue(Collection::of(['10'])->isNumeric()->asBool());
        self::assertTrue(Collection::of([' 10'])->isNumeric()->asBool());
        self::assertTrue(Collection::of(['10.1'])->isNumeric()->asBool());
        self::assertTrue(Collection::of(['10e2'])->isNumeric()->asBool());

        self::assertFalse(Collection::of(['0b10'])->isNumeric()->asBool());
        self::assertFalse(Collection::of(['0x10'])->isNumeric()->asBool());
        self::assertFalse(Collection::of(['null'])->isNumeric()->asBool());
        self::assertFalse(Collection::of([null])->isNumeric()->asBool());
        self::assertFalse(Collection::of([true])->isNumeric()->asBool());
        self::assertFalse(Collection::of([[]])->isNumeric()->asBool());
        self::assertFalse(Collection::of([''])->isNumeric()->asBool());
    }

    public function testIsObject(): void
    {
        self::assertTrue(Collection::of([])->isObject()->asBool());
        self::assertTrue(Collection::of([new \stdClass()])->isObject()->asBool());

        self::assertFalse(Collection::of([1])->isObject()->asBool());
    }

    public function testIsScalar(): void
    {
        self::assertTrue(Collection::of([])->isScalar()->asBool());
        self::assertTrue(Collection::of([1])->isScalar()->asBool());
        self::assertTrue(Collection::of([1.1])->isScalar()->asBool());
        self::assertTrue(Collection::of(['abc'])->isScalar()->asBool());
        self::assertTrue(Collection::of([true, false])->isScalar()->asBool());

        self::assertFalse(Collection::of([new \stdClass()])->isScalar()->asBool());
        self::assertFalse(Collection::of([null])->isScalar()->asBool());
        self::assertFalse(Collection::of([[1]])->isScalar()->asBool());
    }

    public function testJoin(): void
    {
        $m = Collection::of(['a', 'b', null, false]);
        self::assertSame('ab', $m->join());
        self::assertSame('a-b--', $m->join('-'));
    }

    public function testJsonSerialize(): void
    {
        self::assertSame('["a","b"]', Collection::of(['a', 'b'])->toJson());
        self::assertSame('{"a":0,"b":1}', Collection::of(['a' => 0, 'b' => 1])->toJson());
    }

    public function testKeys(): void
    {
        $m = Collection::of(['name' => 'test', 'last' => 'user'])->keys();

        self::assertSame(['name', 'last'], $m);
    }

    public function testKrsortNummeric(): void
    {
        $m = Collection::of([6 => 4, 7 => 3, 9 => 2, 8 => 1, 5 => 0, 4 => -1, 2 => -2, 1 => -3, 3 => -4])->krsort();

        self::assertSame([9 => 2, 8 => 1, 7 => 3, 6 => 4, 5 => 0, 4 => -1, 3 => -4, 2 => -2, 1 => -3], $m->toArray());
    }

    public function testKrsortStrings(): void
    {
        $m = Collection::of(['b' => 'bar-1', 'a' => 'foo', 'c' => 'bar-10'])->krsort();

        self::assertSame(['c' => 'bar-10', 'b' => 'bar-1', 'a' => 'foo'], $m->toArray());
    }

    public function testKsortNummeric(): void
    {
        $m = Collection::of([3 => -4, 1 => -3, 2 => -2, 4 => -1, 5 => 0, 8 => 1, 9 => 2, 7 => 3, 6 => 4])->ksort();

        self::assertSame([1 => -3, 2 => -2, 3 => -4, 4 => -1, 5 => 0, 6 => 4, 7 => 3, 8 => 1, 9 => 2], $m->toArray());
    }

    public function testKsortStrings(): void
    {
        $m = Collection::of(['a' => 'foo', 'c' => 'bar-10', 'b' => 'bar-1'])->ksort();

        self::assertSame(['a' => 'foo', 'b' => 'bar-1', 'c' => 'bar-10'], $m->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testLast(): void
    {
        $m = Collection::of(['foo', 'bar']);
        self::assertSame('bar', $m->last());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testLastWithDefault(): void
    {
        $m = Collection::of([]);
        $result = $m->last('default');
        self::assertSame('default', $result);
    }

    public function testLastWithException(): void
    {
        $m = Collection::of([]);

        $this->expectException(ThrowableInterface::class);
        $result = $m->last(RuntimeException::new('error'));
    }

    public function testLastWithClosure(): void
    {
        $m = Collection::of([]);
        $result = $m->last(function () { return random_int(10, 11); });

        self::assertGreaterThanOrEqual(10, $result);
    }

    public function testLastKey(): void
    {
        self::assertSame('b', Collection::of(['a' => 1, 'b' => 2])->lastKey());
    }

    public function testLastKeyEmpty(): void
    {
        self::assertNull(Collection::of([])->lastKey());
    }

    public function testLtrim(): void
    {
        self::assertEquals(["abc\n", "cde\r\n"], Collection::of([" abc\n", "\tcde\r\n"])->ltrim()->toArray());
        self::assertEquals([' b c', 'xa'], Collection::of(['a b c', 'cbxa'])->ltrim('abc')->toArray());
    }

    public function testMap(): void
    {
        $m = Collection::of(['first' => 'test', 'last' => 'user']);
        $m = $m->map(function ($item, $key) {
            return $key.'-'.strrev($item);
        });

        self::assertSame(['first' => 'first-tset', 'last' => 'last-resu'], $m->toArray());
    }

    public function testMax(): void
    {
        self::assertSame(5.0, Collection::of([1, 3, 2, 5, 4])->max()->value());
    }

    public function testMaxEmpty(): void
    {
        self::assertSame(0.0, Collection::of([])->max()->value());
    }

    public function testMaxZero(): void
    {
        self::assertSame(0.0, Collection::of([0])->max()->value());
    }

    public function testMaxPath(): void
    {
        self::assertSame(50.0, Collection::of([['p' => 30], ['p' => 50], ['p' => 10]])->max('p')->value());
        self::assertSame(50.0, Collection::of([['i' => ['p' => 30]], ['i' => ['p' => 50]]])->max('i/p')->value());
    }

    public function testAvg(): void
    {
        self::assertSame(1.0, Collection::of([1, 1])->avg()->value());
        self::assertSame(3.0, Collection::of([4, 2])->avg()->value());
        self::assertSame(0.5, Collection::of([0, 1])->avg()->value());
        self::assertSame(0.0, Collection::of([0])->avg()->value());
    }

    public function testMergeArray(): void
    {
        $m = Collection::of(['name' => 'Hello']);
        $r = $m->merge(['id' => 1]);

        self::assertSame(['name' => 'Hello', 'id' => 1], $r->toArray());
    }

    public function testMergeMap(): void
    {
        $m = Collection::of(['name' => 'Hello']);
        $r = $m->merge(Collection::of(['name' => 'World', 'id' => 1]));

        self::assertSame(['name' => 'World', 'id' => 1], $r->toArray());
    }

    public function testMergeRecursive(): void
    {
        $r = Collection::of(['a' => 1, 'b' => 2])->merge(['b' => 4, 'c' => 6], true);

        self::assertSame(['a' => 1, 'b' => [2, 4], 'c' => 6], $r->toArray());
    }

    public function testMin(): void
    {
        self::assertSame(1.0, Collection::of([2, 3, 1, 5, 4])->min()->value());
    }

    public function testMinEmpty(): void
    {
        self::assertSame(0.0, Collection::of([])->min()->value());
    }

    public function testMinZero(): void
    {
        self::assertSame(0.0, Collection::of([0])->min()->value());
    }

    public function testMinPath(): void
    {
        self::assertSame(10.0, Collection::of([['p' => 30], ['p' => 50], ['p' => 10]])->min('p')->value());
        self::assertSame(30.0, Collection::of([['i' => ['p' => 30]], ['i' => ['p' => 50]]])->min('i/p')->value());
    }

    public function testNone(): void
    {
        self::assertFalse(Collection::of(['a', 'b'])->none('a')->asBool());
        self::assertFalse(Collection::of(['a', 'b'])->none(['a', 'b'])->asBool());
        self::assertFalse(Collection::of(['a', 'b'])->none(['a', 'x'])->asBool());
        self::assertTrue(Collection::of(['a', 'b'])->none('x')->asBool());
        self::assertTrue(Collection::of(['1', '2'])->none(2, true)->asBool());
        self::assertTrue(Collection::of(['a', 'b'])->none(['x', 'y'])->asBool());
    }

    public function testNth(): void
    {
        $m = Collection::of(['a', 'b', 'c', 'd', 'e', 'f']);

        self::assertSame([0 => 'a', 2 => 'c', 4 => 'e'], $m->nth(2)->toArray());
        self::assertSame([1 => 'b', 3 => 'd', 5 => 'f'], $m->nth(2, 1)->toArray());
    }

    public function testOffsetExists(): void
    {
        $m = Collection::of(['foo', 'bar', 'baz' => null]);

        self::assertTrue($m->offsetExists(0)->asBool());
        self::assertTrue($m->offsetExists(1)->asBool());
        self::assertFalse($m->offsetExists(1000)->asBool());
        self::assertFalse($m->offsetExists('baz')->asBool());
    }

    public function testOffsetGet(): void
    {
        $m = Collection::of(['foo', 'bar']);

        self::assertSame('foo', $m->offsetGet(0));
        self::assertSame('bar', $m->offsetGet(1));
    }

    /**
     * @throws ThrowableInterface
     */
    public function testOffsetSet(): void
    {
        $m = Collection::of(['foo', 'foo']);
        $m->offsetSet(1, 'bar');

        self::assertSame('bar', $m->get(1));
    }

    public function testOffsetUnset(): void
    {
        $m = Collection::of(['foo', 'bar']);

        $m->offsetUnset(1);
        self::assertFalse($m->has(1)->asBool());
    }

    public function testOnly(): void
    {
        self::assertSame(['a' => 1], Collection::of(['a' => 1, 0 => 'b'])->only('a')->toArray());
        self::assertSame([0 => 'b', 1 => 'c'], Collection::of(['a' => 1, 0 => 'b', 1 => 'c'])->only([0, 1])->toArray());
    }

    public function testOrder(): void
    {
        $m = Collection::of(['a' => 1, 1 => 'c', 0 => 'b']);

        self::assertSame([0 => 'b', 1 => 'c', 'a' => 1], $m->order([0, 1, 'a'])->toArray());
        self::assertSame([0 => 'b', 1 => 'c', 2 => null], $m->order([0, 1, 2])->toArray());
        self::assertSame([0 => 'b', 1 => 'c'], $m->order([0, 1])->toArray());
    }

    public function testPad(): void
    {
        self::assertSame([1, 2, 3, null, null], Collection::of([1, 2, 3])->pad(5)->toArray());
        self::assertSame([null, null, 1, 2, 3], Collection::of([1, 2, 3])->pad(-5)->toArray());

        self::assertSame([1, 2, 3, '0', '0'], Collection::of([1, 2, 3])->pad(5, '0')->toArray());
        self::assertSame([1, 2, 3], Collection::of([1, 2, 3])->pad(2)->toArray());

        self::assertSame([0 => 1, 1 => 2, 2 => null], Collection::of([10 => 1, 20 => 2])->pad(3)->toArray());
        self::assertSame(['a' => 1, 'b' => 2, 0 => 3], Collection::of(['a' => 1, 'b' => 2])->pad(3, 3)->toArray());
    }

    public function testPartition(): void
    {
        $expected = [[0 => 1, 1 => 2], [2 => 3, 3 => 4], [4 => 5]];

        self::assertSame($expected, Collection::of([1, 2, 3, 4, 5])->partition(3)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testPartitionClosure(): void
    {
        $expected = [[0 => 1, 3 => 4], [1 => 2, 4 => 5], [2 => 3]];

        self::assertSame($expected, Collection::of([1, 2, 3, 4, 5])->partition(function ($val, $idx) {
            return $idx % 3;
        })->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testPartitionEmpty(): void
    {
        self::assertSame([], Collection::of([])->partition(2)->toArray());
    }

    public function testPartitionInvalid(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([1])->partition([]);
    }

    public function testPipe(): void
    {
        $map = Collection::of([1, 2, 3]);

        self::assertSame(3, $map->pipe(function ($map) {
            return $map->last();
        }));
    }

    public function testPluck(): void
    {
        $map = Collection::of([['foo' => 'one', 'bar' => 'two']]);
        $r = $map->pluck('bar');

        self::assertSame([0 => 'two'], $r->toArray());
    }

    public function testPop(): void
    {
        $m = Collection::of(['foo', 'bar']);

        self::assertSame('bar', $m->pop());
        self::assertSame(['foo'], $m->toArray());
    }

    public function testPos(): void
    {
        $m = Collection::of([4 => 'a', 8 => 'b']);

        self::assertSame(1, $m->pos('b'));
    }

    public function testPosClosure(): void
    {
        $m = Collection::of([4 => 'a', 8 => 'b']);

        self::assertSame(1, $m->pos(function ($item, $key) {
            return 'b' === $item;
        }));
    }

    public function testPosNotFound(): void
    {
        $m = Collection::of([]);

        self::assertNull($m->pos('b'));
    }

    public function testPrefix(): void
    {
        self::assertSame(['1-a', '1-b'], Collection::of(['a', 'b'])->prefix('1-')->toArray());
        self::assertSame(['1-a', ['1-b']], Collection::of(['a', ['b']])->prefix('1-')->toArray());
        self::assertSame(['1-a', ['b']], Collection::of(['a', ['b']])->prefix('1-', 1)->toArray());
    }

    public function testPrepend(): void
    {
        $m = Collection::of(['one', 'two', 'three', 'four'])->prepend('zero');
        self::assertSame(['zero', 'one', 'two', 'three', 'four'], $m->toArray());
    }

    public function testPull(): void
    {
        $m = Collection::of(['foo', 'bar']);

        self::assertSame('foo', $m->pull(0));
        self::assertSame([1 => 'bar'], $m->toArray());
    }

    public function testPullDefault(): void
    {
        $m = Collection::of([]);
        $value = $m->pull(0, 'foo');
        self::assertSame('foo', $value);
    }

    public function testPullWithException(): void
    {
        $m = Collection::of([]);

        $this->expectException(ThrowableInterface::class);
        $result = $m->pull('Y', RuntimeException::new('error'));
    }

    public function testPullWithClosure(): void
    {
        $m = Collection::of([]);
        $result = $m->pull(1, function () { return random_int(10, 11); });

        self::assertGreaterThanOrEqual(10, $result);
    }

    public function testPush(): void
    {
        $m = Collection::of([])->push('foo');

        self::assertSame(['foo'], $m->toArray());
    }

    public function testPut(): void
    {
        $r = Collection::of([])->put('foo', 1);

        self::assertSame(['foo' => 1], $r->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testRandom(): void
    {
        $m = Collection::of(['a' => 1, 'b' => 2, 'c' => 3]);
        $r = $m->random();

        self::assertCount(1, $r->toArray());
        self::assertCount(1, $r->intersectAssoc($m)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testRandomEmpty(): void
    {
        $m = Collection::of();
        self::assertCount(0, $m->random()->toArray());
    }

    public function testRandomException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of()->random(0);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testRandomMax(): void
    {
        $m = Collection::of(['a' => 1, 'b' => 2, 'c' => 3]);
        self::assertCount(3, $m->random(4)->intersectAssoc($m)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testRandomMultiple(): void
    {
        $m = Collection::of(['a' => 1, 'b' => 2, 'c' => 3]);
        self::assertCount(2, $m->random(2)->intersectAssoc($m)->toArray());
    }

    public function testReduce(): void
    {
        $m = Collection::of([1, 2, 3]);
        self::assertSame(6, $m->reduce(function ($carry, $element) {
            return $carry += $element;
        }));
    }

    public function testReject(): void
    {
        $m = Collection::of([2 => 'a', 6 => null, 13 => 'm']);

        self::assertSame([6 => null], $m->reject()->toArray());
    }

    public function testRejectCallback(): void
    {
        $m = Collection::of([2 => 'a', 6 => 'b', 13 => 'm', 30 => 'z']);

        self::assertSame([13 => 'm', 30 => 'z'], $m->reject(function ($value) {
            return $value < 'm';
        })->toArray());
    }

    public function testRejectValue(): void
    {
        $m = Collection::of([2 => 'a', 13 => 'm', 30 => 'z']);
        $r = $m->reject('m');

        self::assertSame([2 => 'a', 30 => 'z'], $r->toArray());
    }

    public function testRekey(): void
    {
        $m = Collection::of(['a' => 2, 'b' => 4]);
        $m = $m->rekey(function ($item, $key) {
            return 'key-'.$key;
        });

        self::assertSame(['key-a' => 2, 'key-b' => 4], $m->toArray());
    }

    public function testRemoveNumeric(): void
    {
        $m = Collection::of(['foo', 'bar']);
        $r = $m->remove(0);

        self::assertFalse($m->has('foo')->asBool());
    }

    public function testRemoveNumericMultiple(): void
    {
        $m = Collection::of(['foo', 'bar', 'baz']);
        $r = $m->remove([0, 2]);

        self::assertFalse($m->has(0)->asBool());
        self::assertFalse($m->has(2)->asBool());
        self::assertTrue($m->has(1)->asBool());
    }

    public function testRemoveString(): void
    {
        $m = Collection::of(['foo' => 'bar', 'baz' => 'qux']);
        $r = $m->remove('foo');

        self::assertFalse($m->has('foo')->asBool());
    }

    public function testRemoveStringMultiple(): void
    {
        $m = Collection::of(['name' => 'test', 'foo' => 'bar', 'baz' => 'qux']);
        $r = $m->remove(['foo', 'baz']);

        self::assertFalse($m->has('foo')->asBool());
        self::assertFalse($m->has('baz')->asBool());
        self::assertTrue($m->has('name')->asBool());
    }

    public function testReplaceArray(): void
    {
        $m = Collection::of(['a', 'b', 'c']);
        $r = $m->replace([1 => 'd', 2 => 'e']);

        self::assertSame(['a', 'd', 'e'], $r->toArray());
    }

    public function testReplaceMap(): void
    {
        $m = Collection::of(['a', 'b', 'c']);
        $r = $m->replace(Collection::of([1 => 'd', 2 => 'e']));

        self::assertSame(['a', 'd', 'e'], $r->toArray());
    }

    public function testReplaceNonRecursive(): void
    {
        $m = Collection::of(['a', 'b', ['c']]);
        $r = $m->replace([1 => 'd', 2 => [1 => 'f']], false);

        self::assertSame(['a', 'd', [1 => 'f']], $r->toArray());
    }

    public function testReplaceRecursiveArray(): void
    {
        $m = Collection::of(['a', 'b', ['c', 'd']]);
        $r = $m->replace(['z', 2 => [1 => 'e']]);

        self::assertSame(['z', 'b', ['c', 'e']], $r->toArray());
    }

    public function testReplaceRecursiveMap(): void
    {
        $m = Collection::of(['a', 'b', ['c', 'd']]);
        $r = $m->replace(Collection::of(['z', 2 => [1 => 'e']]));

        self::assertSame(['z', 'b', ['c', 'e']], $r->toArray());
    }

    public function testReverse(): void
    {
        $m = Collection::of(['hello', 'world']);
        $reversed = $m->reverse();

        self::assertSame([1 => 'world', 0 => 'hello'], $reversed->toArray());
    }

    public function testReverseKeys(): void
    {
        $m = Collection::of(['name' => 'test', 'last' => 'user']);
        $reversed = $m->reverse();

        self::assertSame(['last' => 'user', 'name' => 'test'], $reversed->toArray());
    }

    public function testRsortNummeric(): void
    {
        $m = Collection::of([-1, -3, -2, -4, -5, 0, 5, 3, 1, 2, 4])->rsort();

        self::assertSame([5, 4, 3, 2, 1, 0, -1, -2, -3, -4, -5], $m->toArray());
    }

    public function testRsortStrings(): void
    {
        $m = Collection::of(['bar-10', 'foo', 'bar-1'])->rsort();

        self::assertSame(['foo', 'bar-10', 'bar-1'], $m->toArray());
    }

    public function testRtrim(): void
    {
        self::assertEquals([' abc', "\tcde"], Collection::of([" abc\n", "\tcde\r\n"])->rtrim()->toArray());
        self::assertEquals(['a b ', 'cbx'], Collection::of(['a b c', 'cbxa'])->rtrim('abc')->toArray());
    }

    public function testSearch(): void
    {
        $m = Collection::of([false, 0, 1, [], '']);

        self::assertNull($m->search('false'));
        self::assertNull($m->search('1'));
        self::assertSame(0, $m->search(false));
        self::assertSame(1, $m->search(0));
        self::assertSame(2, $m->search(1));
        self::assertSame(3, $m->search([]));
        self::assertSame(4, $m->search(''));
    }

    public function testSep(): void
    {
        self::assertSame('baz', Collection::of(['foo' => ['bar' => 'baz']])->sep('/')->get('foo/bar'));
    }

    public function testSet(): void
    {
        $map = Collection::of([]);
        $map->set('foo', 1);

        self::assertSame(['foo' => 1], $map->toArray());
    }

    public function testSetNested(): void
    {
        $map = Collection::of(['foo' => 1]);
        $map->set('bar', ['nested' => 'two']);

        self::assertSame(['foo' => 1, 'bar' => ['nested' => 'two']], $map->toArray());
    }

    public function testSetOverwrite(): void
    {
        $map = Collection::of(['foo' => 3]);
        $map->set('foo', 3);

        self::assertSame(['foo' => 3], $map->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testShift(): void
    {
        $m = Collection::of(['foo', 'bar']);

        self::assertSame('foo', $m->shift());
        self::assertSame('bar', $m->first());
        self::assertSame(1, $m->count()->value());
    }

    public function testShuffle(): void
    {
        $map = Collection::of(range(0, 100, 10));

        $firstRandom = $map->copy()->shuffle();
        $secondRandom = $map->copy()->shuffle();

        self::assertNotEquals($firstRandom->toArray(), $secondRandom->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testShuffleAssoc(): void
    {
        $map = Collection::of(range(0, 100, 10));

        $result = $map->copy()->shuffle(true);

        self::assertFalse($map->is($result, true)->asBool());

        foreach ($map->toArray() as $key => $value) {
            self::assertSame($value, $result->get($key));
        }
    }

    /**
     * @throws ThrowableInterface
     */
    public function testSkip(): void
    {
        self::assertSame([2 => 3, 3 => 4], Collection::of([1, 2, 3, 4])->skip(2)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testSkipFunction(): void
    {
        $fcn = function ($item, $key) {
            return $item < 4;
        };

        self::assertSame([3 => 4], Collection::of([1, 2, 3, 4])->skip($fcn)->toArray());
    }

    public function testSkipException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([])->skip([]);
    }

    public function testSliceOffset(): void
    {
        $map = Collection::of([1, 2, 3, 4, 5, 6, 7, 8])->slice(3);

        self::assertSame([4, 5, 6, 7, 8], $map->values()->toArray());
    }

    public function testSliceNegativeOffset(): void
    {
        $map = Collection::of([1, 2, 3, 4, 5, 6, 7, 8])->slice(-3);

        self::assertSame([6, 7, 8], $map->values()->toArray());
    }

    public function testSliceOffsetAndLength(): void
    {
        $map = Collection::of([1, 2, 3, 4, 5, 6, 7, 8])->slice(3, 3);

        self::assertSame([4, 5, 6], $map->values()->toArray());
    }

    public function testSliceOffsetAndNegativeLength(): void
    {
        $map = Collection::of([1, 2, 3, 4, 5, 6, 7, 8])->slice(3, -1);

        self::assertSame([4, 5, 6, 7], $map->values()->toArray());
    }

    public function testSliceNegativeOffsetAndLength(): void
    {
        $map = Collection::of([1, 2, 3, 4, 5, 6, 7, 8])->slice(-5, 3);

        self::assertSame([4, 5, 6], $map->values()->toArray());
    }

    public function testSliceNegativeOffsetAndNegativeLength(): void
    {
        $map = Collection::of([1, 2, 3, 4, 5, 6, 7, 8])->slice(-6, -2);

        self::assertSame([3, 4, 5, 6], $map->values()->toArray());
    }

    public function testSome(): void
    {
        self::assertTrue(Collection::of(['a', 'b'])->some('a')->asBool());
        self::assertFalse(Collection::of(['a', 'b'])->some('c')->asBool());
    }

    public function testSomeStrict(): void
    {
        self::assertTrue(Collection::of(['1', '2'])->some('2', true)->asBool());
        self::assertFalse(Collection::of(['1', '2'])->some(2, true)->asBool());
    }

    public function testSomeList(): void
    {
        self::assertTrue(Collection::of(['a', 'b'])->some(['a', 'c'])->asBool());
        self::assertFalse(Collection::of(['a', 'b'])->some(['c', 'd'])->asBool());
    }

    public function testSomeListStrict(): void
    {
        self::assertTrue(Collection::of(['1', '2'])->some(['2'], true)->asBool());
        self::assertFalse(Collection::of(['1', '2'])->some([2], true)->asBool());
    }

    public function testSomeCallback(): void
    {
        $fcn = function ($item, $key) {
            return 'a' === $item;
        };

        self::assertTrue(Collection::of(['a', 'b'])->some($fcn)->asBool());
        self::assertFalse(Collection::of(['c', 'd'])->some($fcn)->asBool());
    }

    public function testSortNummeric(): void
    {
        $m = Collection::of([-1, -3, -2, -4, -5, 0, 5, 3, 1, 2, 4])->sort();

        self::assertSame([-5, -4, -3, -2, -1, 0, 1, 2, 3, 4, 5], $m->toArray());
    }

    public function testSortStrings(): void
    {
        $m = Collection::of(['foo', 'bar-10', 'bar-1'])->sort();

        self::assertSame(['bar-1', 'bar-10', 'foo'], $m->toArray());
    }

    public function testSplice(): void
    {
        $m = Collection::of(['foo', 'baz']);
        $r = $m->splice(1);

        self::assertSame(['foo'], $m->toArray());
    }

    public function testSpliceReplace(): void
    {
        $m = Collection::of(['foo', 'baz']);
        $r = $m->splice(1, 0, 'bar');

        self::assertSame(['foo', 'bar', 'baz'], $m->toArray());
    }

    public function testSpliceRemove(): void
    {
        $m = Collection::of(['foo', 'baz']);
        $r = $m->splice(1, 1);

        self::assertSame(['foo'], $m->toArray());
    }

    public function testSpliceCut(): void
    {
        $m = Collection::of(['foo', 'baz']);
        $r = $m->splice(1, 1, 'bar');

        self::assertSame(['foo', 'bar'], $m->toArray());
        self::assertSame(['baz'], $r->toArray());
    }

    public function testSpliceAll(): void
    {
        $m = Collection::of(['foo', 'baz']);
        $r = $m->splice(1, null, ['bar']);

        self::assertSame(['foo', 'bar'], $m->toArray());
    }

    public function testStrAfter(): void
    {
        self::assertEquals(['1', '1', '1'], Collection::of([1, 1.0, true, ['x'], new \stdClass()])->strAfter('')->all());
        self::assertEquals(['0', '0'], Collection::of([0, 0.0, false, []])->strAfter('')->all());
        self::assertEquals(['üß'], Collection::of(['äöüß'])->strAfter('ö')->all());
        self::assertEquals(['abc'], Collection::of(['abc'])->strAfter('')->all());
        self::assertEquals(['c'], Collection::of(['abc'])->strAfter('b')->all());
        self::assertEquals([''], Collection::of(['abc'])->strAfter('c')->all());
        self::assertEquals([], Collection::of(['abc'])->strAfter('x')->all());
        self::assertEquals([], Collection::of([''])->strAfter('')->all());
    }

    public function testStrBefore(): void
    {
        self::assertEquals(['1', '1', '1'], Collection::of([1, 1.0, true, ['x'], new \stdClass()])->strBefore('')->all());
        self::assertEquals(['0', '0'], Collection::of([0, 0.0, false, []])->strBefore('')->all());
        self::assertEquals(['äö'], Collection::of(['äöüß'])->strBefore('ü')->all());
        self::assertEquals(['abc'], Collection::of(['abc'])->strBefore('')->all());
        self::assertEquals(['a'], Collection::of(['abc'])->strBefore('b')->all());
        self::assertEquals([''], Collection::of(['abc'])->strBefore('a')->all());
        self::assertEquals([], Collection::of(['abc'])->strBefore('x')->all());
        self::assertEquals([], Collection::of([''])->strBefore('')->all());
    }

    public function testStrContains(): void
    {
        self::assertTrue(Collection::of(['abc'])->strContains('')->asBool());
        self::assertTrue(Collection::of(['abc'])->strContains('a')->asBool());
        self::assertTrue(Collection::of(['abc'])->strContains('b')->asBool());
        self::assertTrue(Collection::of(['abc'])->strContains(['b', 'd'])->asBool());
        self::assertTrue(Collection::of([12345])->strContains('23')->asBool());
        self::assertTrue(Collection::of([123.4])->strContains(23.4)->asBool());
        self::assertTrue(Collection::of([12345])->strContains(false)->asBool());
        self::assertTrue(Collection::of([12345])->strContains(true)->asBool());
        self::assertTrue(Collection::of([false])->strContains(false)->asBool());
        self::assertTrue(Collection::of([''])->strContains(false)->asBool());
        self::assertTrue(Collection::of(['abc'])->strContains('c', 'ASCII')->asBool());

        self::assertFalse(Collection::of(['abc'])->strContains('d')->asBool());
        self::assertFalse(Collection::of(['abc'])->strContains('cb')->asBool());
        self::assertFalse(Collection::of([23456])->strContains(true)->asBool());
        self::assertFalse(Collection::of([false])->strContains(0)->asBool());
        self::assertFalse(Collection::of(['abc'])->strContains(['d', 'e'])->asBool());
        self::assertFalse(Collection::of(['abc'])->strContains('cb', 'ASCII')->asBool());
    }

    public function testStrContainsAll(): void
    {
        self::assertTrue(Collection::of(['abc', 'def'])->strContainsAll('')->asBool());
        self::assertTrue(Collection::of(['abc', 'cba'])->strContainsAll('a')->asBool());
        self::assertTrue(Collection::of(['abc', 'bca'])->strContainsAll('bc')->asBool());
        self::assertTrue(Collection::of([12345, '230'])->strContainsAll('23')->asBool());
        self::assertTrue(Collection::of([123.4, 23.42])->strContainsAll(23.4)->asBool());
        self::assertTrue(Collection::of([12345, '234'])->strContainsAll([true, false])->asBool());
        self::assertTrue(Collection::of(['', false])->strContainsAll(false)->asBool());
        self::assertTrue(Collection::of(['abc', 'def'])->strContainsAll(['b', 'd'])->asBool());
        self::assertTrue(Collection::of(['abc', 'ecf'])->strContainsAll('c', 'ASCII')->asBool());

        self::assertFalse(Collection::of(['abc', 'def'])->strContainsAll('d')->asBool());
        self::assertFalse(Collection::of(['abc', 'cab'])->strContainsAll('cb')->asBool());
        self::assertFalse(Collection::of([23456, '123'])->strContainsAll(true)->asBool());
        self::assertFalse(Collection::of([false, '000'])->strContainsAll(0)->asBool());
        self::assertFalse(Collection::of(['abc', 'acf'])->strContainsAll(['d', 'e'])->asBool());
        self::assertFalse(Collection::of(['abc', 'bca'])->strContainsAll('cb', 'ASCII')->asBool());
    }

    public function testStrEnds(): void
    {
        self::assertTrue(Collection::of(['abc'])->strEnds('')->asBool());
        self::assertTrue(Collection::of(['abc'])->strEnds('c')->asBool());
        self::assertTrue(Collection::of(['abc'])->strEnds('bc')->asBool());
        self::assertTrue(Collection::of(['abc'])->strEnds(['b', 'c'])->asBool());
        self::assertTrue(Collection::of(['abc'])->strEnds('c', 'ASCII')->asBool());
        self::assertFalse(Collection::of(['abc'])->strEnds('a')->asBool());
        self::assertFalse(Collection::of(['abc'])->strEnds('cb')->asBool());
        self::assertFalse(Collection::of(['abc'])->strEnds(['d', 'b'])->asBool());
        self::assertFalse(Collection::of(['abc'])->strEnds('cb', 'ASCII')->asBool());
    }

    public function testStrEndsAll(): void
    {
        self::assertTrue(Collection::of(['abc', 'def'])->strEndsAll('')->asBool());
        self::assertTrue(Collection::of(['abc', 'bac'])->strEndsAll('c')->asBool());
        self::assertTrue(Collection::of(['abc', 'cbc'])->strEndsAll('bc')->asBool());
        self::assertTrue(Collection::of(['abc', 'def'])->strEndsAll(['c', 'f'])->asBool());
        self::assertTrue(Collection::of(['abc', 'efc'])->strEndsAll('c', 'ASCII')->asBool());
        self::assertFalse(Collection::of(['abc', 'fed'])->strEndsAll('d')->asBool());
        self::assertFalse(Collection::of(['abc', 'bca'])->strEndsAll('ca')->asBool());
        self::assertFalse(Collection::of(['abc', 'acf'])->strEndsAll(['a', 'c'])->asBool());
        self::assertFalse(Collection::of(['abc', 'bca'])->strEndsAll('ca', 'ASCII')->asBool());
    }

    public function testStrLower(): void
    {
        self::assertEquals(['my string'], Collection::of(['My String'])->strLower()->all());
        self::assertEquals(['τάχιστη'], Collection::of(['Τάχιστη'])->strLower()->all());

        $list = [mb_convert_encoding('ÄPFEL', 'ISO-8859-1'), 'BIRNEN'];
        $expected = [mb_convert_encoding('äpfel', 'ISO-8859-1'), 'birnen'];
        self::assertEquals($expected, Collection::of($list)->strLower('ISO-8859-1')->all());

        self::assertEquals([123], Collection::of([123])->strLower()->all());
        self::assertEquals([new \stdClass()], Collection::of([new \stdClass()])->strLower()->all());
    }

    public function testString(): void
    {
        self::assertSame('1', Collection::of(['a' => true])->string('a'));
        self::assertSame('1', Collection::of(['a' => 1])->string('a'));
        self::assertSame('1.1', Collection::of(['a' => 1.1])->string('a'));
        self::assertSame('abc', Collection::of(['a' => 'abc'])->string('a'));
        self::assertSame('yes', Collection::of(['a' => ['b' => ['c' => 'yes']]])->string('a/b/c'));
        self::assertSame('no', Collection::of([])->string('a', 'no'));

        self::assertSame('', Collection::of([])->string('b'));
        self::assertSame('', Collection::of(['b' => ''])->string('b'));
        self::assertSame('', Collection::of(['b' => null])->string('b'));
        self::assertSame('', Collection::of(['b' => [true]])->string('b'));
        self::assertSame('', Collection::of(['b' => new \stdClass()])->string('b'));
    }

    public function testStrUpper(): void
    {
        self::assertEquals(['MY STRING'], Collection::of(['My String'])->strUpper()->all());
        self::assertEquals(['ΤΆΧΙΣΤΗ'], Collection::of(['τάχιστη'])->strUpper()->all());

        $list = [mb_convert_encoding('äpfel', 'ISO-8859-1'), 'birnen'];
        $expected = [mb_convert_encoding('ÄPFEL', 'ISO-8859-1'), 'BIRNEN'];
        self::assertEquals($expected, Collection::of($list)->strUpper('ISO-8859-1')->all());

        self::assertEquals([123], Collection::of([123])->strUpper()->all());
        self::assertEquals([new \stdClass()], Collection::of([new \stdClass()])->strUpper()->all());
    }

    public function testStringClosure(): void
    {
        self::assertSame('no', Collection::of([])->string('c', function () { return 'no'; }));
    }

    public function testStringException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([])->string('c', RuntimeException::new('error'));
    }

    public function testStringReplace(): void
    {
        self::assertEquals(['google.de', 'aimeos.de'], Collection::of(['google.com', 'aimeos.com'])->strReplace('.com', '.de')->all());
        self::assertEquals(['google.de', 'aimeos.de'], Collection::of(['google.com', 'aimeos.org'])->strReplace(['.com', '.org'], '.de')->all());
        self::assertEquals(['google.de', 'aimeos'], Collection::of(['google.com', 'aimeos.org'])->strReplace(['.com', '.org'], ['.de'])->all());
        self::assertEquals(['google.fr', 'aimeos.de'], Collection::of(['google.com', 'aimeos.org'])->strReplace(['.com', '.org'], ['.fr', '.de'])->all());
        self::assertEquals(['google.de', 'aimeos.de'], Collection::of(['google.com', 'aimeos.com'])->strReplace(['.com', '.co'], ['.co', '.de', '.fr'])->all());
        self::assertEquals(['google.de', 'aimeos.de', 123], Collection::of(['google.com', 'aimeos.com', 123])->strReplace('.com', '.de')->all());
        self::assertEquals(['GOOGLE.de', 'AIMEOS.de'], Collection::of(['GOOGLE.COM', 'AIMEOS.COM'])->strReplace('.com', '.de', true)->all());
    }

    public function testStrStarts(): void
    {
        self::assertTrue(Collection::of(['abc'])->strStarts('')->asBool());
        self::assertTrue(Collection::of(['abc'])->strStarts('a')->asBool());
        self::assertTrue(Collection::of(['abc'])->strStarts('ab')->asBool());
        self::assertTrue(Collection::of(['abc'])->strStarts(['a', 'b'])->asBool());
        self::assertTrue(Collection::of(['abc'])->strStarts('ab', 'ASCII')->asBool());
        self::assertFalse(Collection::of(['abc'])->strStarts('b')->asBool());
        self::assertFalse(Collection::of(['abc'])->strStarts('bc')->asBool());
        self::assertFalse(Collection::of(['abc'])->strStarts(['b', 'c'])->asBool());
        self::assertFalse(Collection::of(['abc'])->strStarts('bc', 'ASCII')->asBool());
    }

    public function testStrStartsAll(): void
    {
        self::assertTrue(Collection::of(['abc', 'def'])->strStartsAll('')->asBool());
        self::assertTrue(Collection::of(['abc', 'acb'])->strStartsAll('a')->asBool());
        self::assertTrue(Collection::of(['abc', 'aba'])->strStartsAll('ab')->asBool());
        self::assertTrue(Collection::of(['abc', 'def'])->strStartsAll(['a', 'd'])->asBool());
        self::assertTrue(Collection::of(['abc', 'acf'])->strStartsAll('a', 'ASCII')->asBool());
        self::assertFalse(Collection::of(['abc', 'def'])->strStartsAll('d')->asBool());
        self::assertFalse(Collection::of(['abc', 'bca'])->strStartsAll('ab')->asBool());
        self::assertFalse(Collection::of(['abc', 'bac'])->strStartsAll(['a', 'c'])->asBool());
        self::assertFalse(Collection::of(['abc', 'cab'])->strStartsAll('ab', 'ASCII')->asBool());
    }

    public function testSuffix(): void
    {
        self::assertSame(['a-1', 'b-1'], Collection::of(['a', 'b'])->suffix('-1')->toArray());
        self::assertSame(['a-1', ['b-1']], Collection::of(['a', ['b']])->suffix('-1')->toArray());
        self::assertSame(['a-1', ['b']], Collection::of(['a', ['b']])->suffix('-1', 1)->toArray());
    }

    public function testSum(): void
    {
        self::assertSame(9.0, Collection::of([1, 3, 5])->sum()->value());
        self::assertSame(6.0, Collection::of([1, 0.0, 5])->sum()->value());
    }

    public function testSumPath(): void
    {
        self::assertSame(90.0, Collection::of([['p' => 30], ['p' => 50], ['p' => 10]])->sum('p')->value());
        self::assertSame(80.0, Collection::of([['i' => ['p' => 30]], ['i' => ['p' => 50]]])->sum('i/p')->value());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testTake(): void
    {
        self::assertSame([1, 2], Collection::of([1, 2, 3, 4])->take(2)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testTakeOffset(): void
    {
        self::assertSame([1 => 2, 2 => 3], Collection::of([1, 2, 3, 4])->take(2, 1)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testTakeNegativeOffset(): void
    {
        self::assertSame([2 => 3, 3 => 4], Collection::of([1, 2, 3, 4])->take(2, -2)->toArray());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testTakeFunction(): void
    {
        $fcn = function ($item, $key) {
            return $item < 2;
        };

        self::assertSame([1 => 2, 2 => 3], Collection::of([1, 2, 3, 4])->take(2, $fcn)->toArray());
    }

    public function testTakeException(): void
    {
        $this->expectException(ThrowableInterface::class);
        Collection::of([])->take(0, []);
    }

    public function testTap(): void
    {
        $map = Collection::of([1, 2, 3]);

        self::assertSame(3, $map->tap(function ($map) {
            return $map->clear();
        })->count()->value());
    }

    public function testTranspose(): void
    {
        $m = Collection::of([
            ['name' => 'A', 2020 => 200, 2021 => 100, 2022 => 50],
            ['name' => 'B', 2020 => 300, 2021 => 200, 2022 => 100],
            ['name' => 'C', 2020 => 400, 2021 => 300, 2022 => 200],
        ]);

        $expected = [
            'name' => ['A', 'B', 'C'],
            2020 => [200, 300, 400],
            2021 => [100, 200, 300],
            2022 => [50, 100, 200],
        ];

        self::assertSame($expected, $m->transpose()->toArray());
    }

    public function testTransposeLength(): void
    {
        $m = Collection::of([
            ['name' => 'A', 2020 => 200, 2021 => 100, 2022 => 50],
            ['name' => 'B', 2020 => 300, 2021 => 200],
            ['name' => 'C', 2020 => 400],
        ]);

        $expected = [
            'name' => ['A', 'B', 'C'],
            2020 => [200, 300, 400],
            2021 => [100, 200],
            2022 => [50],
        ];

        self::assertSame($expected, $m->transpose()->toArray());
    }

    public function testTraverse(): void
    {
        $expected = [
            ['id' => 1, 'pid' => null, 'name' => 'n1', 'children' => [
                ['id' => 2, 'pid' => 1, 'name' => 'n2', 'children' => []],
                ['id' => 3, 'pid' => 1, 'name' => 'n3', 'children' => []],
            ]],
            ['id' => 2, 'pid' => 1, 'name' => 'n2', 'children' => []],
            ['id' => 3, 'pid' => 1, 'name' => 'n3', 'children' => []],
        ];

        $r = Collection::of([[
            'id' => 1, 'pid' => null, 'name' => 'n1', 'children' => [
                ['id' => 2, 'pid' => 1, 'name' => 'n2', 'children' => []],
                ['id' => 3, 'pid' => 1, 'name' => 'n3', 'children' => []],
            ],
        ]])->traverse();

        self::assertSame($expected, $r->toArray());
    }

    public function testTraverseCallback(): void
    {
        $r = Collection::of([[
            'id' => 1, 'pid' => null, 'name' => 'n1', 'children' => [
                ['id' => 2, 'pid' => 1, 'name' => 'n2', 'children' => []],
                ['id' => 3, 'pid' => 1, 'name' => 'n3', 'children' => []],
            ],
        ]])->traverse(function ($entry, $key, $level) {
            return str_repeat('-', $level).'- '.$entry['name'];
        });

        self::assertSame(['- n1', '-- n2', '-- n3'], $r->toArray());
    }

    public function testTraverseCallbackObject(): void
    {
        $r = Collection::of([(object) [
            'id' => 1, 'pid' => null, 'name' => 'n1', 'children' => [
                (object) ['id' => 2, 'pid' => 1, 'name' => 'n2', 'children' => []],
                (object) ['id' => 3, 'pid' => 1, 'name' => 'n3', 'children' => []],
            ],
        ]])->traverse(function ($entry, $key, $level) {
            return str_repeat('-', $level).'- '.$entry->name;
        });

        self::assertSame(['- n1', '-- n2', '-- n3'], $r->toArray());
    }

    public function testTraverseCallbackParent(): void
    {
        $expected = [
            ['id' => 1, 'pid' => null, 'name' => 'n1', 'children' => [
                ['id' => 2, 'pid' => 1, 'name' => 'n2', 'children' => []],
                ['id' => 3, 'pid' => 1, 'name' => 'n3', 'children' => []],
            ], 'path' => 'n1'],
            ['id' => 2, 'pid' => 1, 'name' => 'n2', 'children' => [], 'path' => 'n1/n2'],
            ['id' => 3, 'pid' => 1, 'name' => 'n3', 'children' => [], 'path' => 'n1/n3'],
        ];

        $r = Collection::of([[
            'id' => 1, 'pid' => null, 'name' => 'n1', 'children' => [
                ['id' => 2, 'pid' => 1, 'name' => 'n2', 'children' => []],
                ['id' => 3, 'pid' => 1, 'name' => 'n3', 'children' => []],
            ],
        ]])->traverse(function (&$entry, $key, $level, $parent) {
            $entry['path'] = isset($parent['path']) ? $parent['path'].'/'.$entry['name'] : $entry['name'];

            return $entry;
        });

        self::assertSame($expected, $r->toArray());
    }

    public function testTraverseNestkey(): void
    {
        $expected = [
            ['id' => 1, 'pid' => null, 'name' => 'n1', 'nodes' => [
                ['id' => 2, 'pid' => 1, 'name' => 'n2', 'nodes' => []],
            ]],
            ['id' => 2, 'pid' => 1, 'name' => 'n2', 'nodes' => []],
        ];

        $r = Collection::of([[
            'id' => 1, 'pid' => null, 'name' => 'n1', 'nodes' => [
                ['id' => 2, 'pid' => 1, 'name' => 'n2', 'nodes' => []],
            ],
        ]])->traverse(null, 'nodes');

        self::assertSame($expected, $r->toArray());
    }

    public function testTree(): void
    {
        $expected = [
            1 => [
                'id' => 1, 'pid' => null, 'name' => 'Root', 'children' => [
                    2 => ['id' => 2, 'pid' => 1, 'name' => '1/2', 'children' => [
                        4 => ['id' => 4, 'pid' => 2, 'name' => '1/2/4', 'children' => []],
                        5 => ['id' => 5, 'pid' => 2, 'name' => '1/2/5', 'children' => []],
                    ]],
                    3 => ['id' => 3, 'pid' => 1, 'name' => '1/3', 'children' => [
                        6 => ['id' => 6, 'pid' => 3, 'name' => '1/3/6', 'children' => []],
                        7 => ['id' => 7, 'pid' => 3, 'name' => '1/3/7', 'children' => []],
                    ]],
                ],
            ],
        ];

        $data = [
            ['id' => 1, 'pid' => null, 'name' => 'Root'],
            ['id' => 2, 'pid' => 1, 'name' => '1/2'],
            ['id' => 3, 'pid' => 1, 'name' => '1/3'],
            ['id' => 4, 'pid' => 2, 'name' => '1/2/4'],
            ['id' => 5, 'pid' => 2, 'name' => '1/2/5'],
            ['id' => 6, 'pid' => 3, 'name' => '1/3/6'],
            ['id' => 7, 'pid' => 3, 'name' => '1/3/7'],
        ];

        $m = Collection::of($data);
        self::assertSame($expected, $m->tree('id', 'pid')->toArray());
    }

    public function testTrim(): void
    {
        self::assertEquals(['abc', 'cde'], Collection::of([" abc\n", "\tcde\r\n"])->trim()->toArray());
        self::assertEquals([' b ', 'x'], Collection::of(['a b c', 'cbax'])->trim('abc')->toArray());
    }

    public function testToArray(): void
    {
        $m = Collection::of(['name' => 'Hello']);
        self::assertSame(['name' => 'Hello'], $m->toArray());
    }

    public function testToJson(): void
    {
        $m = Collection::of(['name' => 'Hello']);
        self::assertSame('{"name":"Hello"}', $m->toJson());
    }

    public function testToJsonOptions(): void
    {
        $m = Collection::of(['name', 'Hello']);
        self::assertSame('{"0":"name","1":"Hello"}', $m->toJson(JSON_FORCE_OBJECT));
    }

    public function testToUrl(): void
    {
        self::assertSame('a=1&b=2', Collection::of(['a' => 1, 'b' => 2])->toUrl());
    }

    public function testToUrlNested(): void
    {
        $url = Collection::of(['a' => ['b' => 'abc', 'c' => 'def'], 'd' => 123])->toUrl();
        self::assertSame('a%5Bb%5D=abc&a%5Bc%5D=def&d=123', $url);
    }

    public function testUasort(): void
    {
        $m = Collection::of(['a' => 'foo', 'c' => 'bar-10', 1 => 'bar-1'])->uasort(function ($a, $b) {
            return strrev($a) <=> strrev($b);
        });

        self::assertSame(['c' => 'bar-10', 1 => 'bar-1', 'a' => 'foo'], $m->toArray());
    }

    public function testUksort(): void
    {
        $m = Collection::of(['a' => 'foo', 'c' => 'bar-10', 1 => 'bar-1'])->uksort(function ($a, $b) {
            return (string) $a <=> (string) $b;
        });

        self::assertSame([1 => 'bar-1', 'a' => 'foo', 'c' => 'bar-10'], $m->toArray());
    }

    public function testUsort(): void
    {
        $m = Collection::of(['foo', 'bar-10', 'bar-1'])->usort(function ($a, $b) {
            return strrev($a) <=> strrev($b);
        });

        self::assertSame(['bar-10', 'bar-1', 'foo'], $m->toArray());
    }

    public function testUnionArray(): void
    {
        $m = Collection::of(['name' => 'Hello']);
        $r = $m->union(['id' => 1]);

        self::assertSame(['name' => 'Hello', 'id' => 1], $r->toArray());
    }

    public function testUnionMap(): void
    {
        $m = Collection::of(['name' => 'Hello']);
        $r = $m->union(Collection::of(['name' => 'World', 'id' => 1]));

        self::assertSame(['name' => 'Hello', 'id' => 1], $r->toArray());
    }

    public function testUnique(): void
    {
        $m = Collection::of(['Hello', 'World', 'World']);
        $r = $m->unique();

        self::assertSame(['Hello', 'World'], $r->toArray());
    }

    public function testUniqueKey(): void
    {
        $m = Collection::of([['p' => '1'], ['p' => 1], ['p' => 2]]);
        $r = $m->unique('p');

        self::assertSame([0 => ['p' => '1'], 2 => ['p' => 2]], $r->toArray());
    }

    public function testUniquePath(): void
    {
        $m = Collection::of([['i' => ['p' => '1']], ['i' => ['p' => 1]]]);
        $r = $m->unique('i/p');

        self::assertSame([0 => ['i' => ['p' => '1']]], $r->toArray());
    }

    public function testUnshift(): void
    {
        $m = Collection::of(['one', 'two', 'three', 'four'])->unshift('zero');
        self::assertSame(['zero', 'one', 'two', 'three', 'four'], $m->toArray());
    }

    public function testUnshiftWithKey(): void
    {
        $m = Collection::of(['one' => 1, 'two' => 2])->unshift(0, 'zero');
        self::assertSame(['zero' => 0, 'one' => 1, 'two' => 2], $m->toArray());
    }

    public function testValues(): void
    {
        $m = Collection::of(['id' => 1, 'name' => 'Hello']);
        $r = $m->values();

        self::assertSame([1, 'Hello'], $r->toArray());
    }

    public function testWalk(): void
    {
        $m = Collection::of(['a', 'B', ['c', 'd'], 'e']);
        $r = $m->walk(function (&$value) {
            $value = strtoupper($value);
        });

        self::assertSame(['A', 'B', ['C', 'D'], 'E'], $r->toArray());
    }

    public function testWalkNonRecursive(): void
    {
        $m = Collection::of(['a', 'B', ['c', 'd'], 'e']);
        $r = $m->walk(function (&$value) {
            $value = (!is_array($value) ? strtoupper($value) : $value);
        }, null, false);

        self::assertSame(['A', 'B', ['c', 'd'], 'E'], $r->toArray());
    }

    public function testWalkData(): void
    {
        $m = Collection::of([1, 2, 3]);
        $r = $m->walk(function (&$value, $key, $data) {
            $value = $data[$value] ?? $value;
        }, [1 => 'one', 2 => 'two']);

        self::assertSame(['one', 'two', 3], $r->toArray());
    }

    public function testWhere(): void
    {
        $m = Collection::of([['p' => 10], ['p' => 20], ['p' => 30]]);

        self::assertSame([['p' => 10]], $m->where('p', '==', 10)->toArray());
        self::assertSame([], $m->where('p', '===', '10')->toArray());
        self::assertSame([1 => ['p' => 20], 2 => ['p' => 30]], $m->where('p', '!=', 10)->toArray());
        self::assertSame([['p' => 10], ['p' => 20], ['p' => 30]], $m->where('p', '!==', '10')->toArray());
        self::assertSame([1 => ['p' => 20], 2 => ['p' => 30]], $m->where('p', '>', 10)->toArray());
        self::assertSame([['p' => 10], ['p' => 20]], $m->where('p', '<', 30)->toArray());
        self::assertSame([['p' => 10], ['p' => 20]], $m->where('p', '<=', 20)->toArray());
        self::assertSame([1 => ['p' => 20], 2 => ['p' => 30]], $m->where('p', '>=', 20)->toArray());
    }

    public function testWhereBetween(): void
    {
        $m = Collection::of([['p' => 10], ['p' => 20], ['p' => 30]]);

        self::assertSame([['p' => 10], ['p' => 20]], $m->where('p', '-', [10, 20])->toArray());
        self::assertSame([['p' => 10]], $m->where('p', '-', [10])->toArray());
        self::assertSame([['p' => 10]], $m->where('p', '-', 10)->toArray());
    }

    public function testWhereIn(): void
    {
        $m = Collection::of([['p' => 10], ['p' => 20], ['p' => 30]]);

        self::assertSame([['p' => 10], 2 => ['p' => 30]], $m->where('p', 'in', [10, 30])->toArray());
        self::assertSame([['p' => 10]], $m->where('p', 'in', 10)->toArray());
    }

    public function testWhereNotFound(): void
    {
        self::assertSame([], Collection::of([['p' => 10]])->where('x', '==', [0])->toArray());
    }

    public function testWherePath(): void
    {
        $m = Collection::of([['item' => ['id' => 3, 'price' => 10]], ['item' => ['id' => 4, 'price' => 50]]]);

        self::assertSame([1 => ['item' => ['id' => 4, 'price' => 50]]], $m->where('item/price', '>', 30)->toArray());
    }

    public function testWith(): void
    {
        $m = Collection::of(['a' => 1]);

        self::assertEquals(['a' => 1, 2 => 'b'], $m->with(2, 'b')->toArray());
        self::assertEquals(['a' => 1], $m->toArray());
        self::assertEquals(['a' => 2], $m->with('a', 2)->toArray());
        self::assertEquals(['a' => 1], $m->toArray());
    }

    public function testZip(): void
    {
        $m = Collection::of([1, 2, 3]);
        $en = ['one', 'two', 'three'];
        $es = ['uno', 'dos', 'tres'];

        $expected = [
            [1, 'one', 'uno'],
            [2, 'two', 'dos'],
            [3, 'three', 'tres'],
        ];

        self::assertSame($expected, $m->zip($en, $es)->toArray());
    }
}
