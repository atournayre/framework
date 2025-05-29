<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Aimeos\Map as AimeosMap;
use Atournayre\Contracts\Collection\AddInterface;
use Atournayre\Contracts\Collection\AfterInterface;
use Atournayre\Contracts\Collection\AllInterface;
use Atournayre\Contracts\Collection\ArsortInterface;
use Atournayre\Contracts\Collection\AsortInterface;
use Atournayre\Contracts\Collection\AtInterface;
use Atournayre\Contracts\Collection\AtLeastOneElementInterface;
use Atournayre\Contracts\Collection\AvgInterface;
use Atournayre\Contracts\Collection\BeforeInterface;
use Atournayre\Contracts\Collection\BoolInterface;
use Atournayre\Contracts\Collection\CallInterface;
use Atournayre\Contracts\Collection\CastInterface;
use Atournayre\Contracts\Collection\ChunkInterface;
use Atournayre\Contracts\Collection\ClearInterface;
use Atournayre\Contracts\Collection\CloneInterface;
use Atournayre\Contracts\Collection\ColInterface;
use Atournayre\Contracts\Collection\CollapseInterface;
use Atournayre\Contracts\Collection\CombineInterface;
use Atournayre\Contracts\Collection\CompareInterface;
use Atournayre\Contracts\Collection\ConcatInterface;
use Atournayre\Contracts\Collection\ContainsInterface;
use Atournayre\Contracts\Collection\CopyInterface;
use Atournayre\Contracts\Collection\CountByInterface;
use Atournayre\Contracts\Collection\CountInterface;
use Atournayre\Contracts\Collection\DdInterface;
use Atournayre\Contracts\Collection\DelimiterInterface;
use Atournayre\Contracts\Collection\DiffAssocInterface;
use Atournayre\Contracts\Collection\DiffInterface;
use Atournayre\Contracts\Collection\DiffKeysInterface;
use Atournayre\Contracts\Collection\DumpInterface;
use Atournayre\Contracts\Collection\DuplicatesInterface;
use Atournayre\Contracts\Collection\EachInterface;
use Atournayre\Contracts\Collection\EmptyInterface;
use Atournayre\Contracts\Collection\EqualsInterface;
use Atournayre\Contracts\Collection\EveryInterface;
use Atournayre\Contracts\Collection\ExceptInterface;
use Atournayre\Contracts\Collection\ExplodeInterface;
use Atournayre\Contracts\Collection\FilterInterface;
use Atournayre\Contracts\Collection\FindInterface;
use Atournayre\Contracts\Collection\FirstInterface;
use Atournayre\Contracts\Collection\FirstKeyInterface;
use Atournayre\Contracts\Collection\FlatInterface;
use Atournayre\Contracts\Collection\FlipInterface;
use Atournayre\Contracts\Collection\FloatInterface;
use Atournayre\Contracts\Collection\FromInterface;
use Atournayre\Contracts\Collection\FromJsonInterface;
use Atournayre\Contracts\Collection\GetInterface;
use Atournayre\Contracts\Collection\GetIteratorInterface;
use Atournayre\Contracts\Collection\GrepInterface;
use Atournayre\Contracts\Collection\GroupByInterface;
use Atournayre\Contracts\Collection\HasInterface;
use Atournayre\Contracts\Collection\HasNoElementInterface;
use Atournayre\Contracts\Collection\HasOneElementInterface;
use Atournayre\Contracts\Collection\HasSeveralElementsInterface;
use Atournayre\Contracts\Collection\HasXElementsInterface;
use Atournayre\Contracts\Collection\IfAnyInterface;
use Atournayre\Contracts\Collection\IfEmptyInterface;
use Atournayre\Contracts\Collection\IfInterface;
use Atournayre\Contracts\Collection\ImplementsInterface;
use Atournayre\Contracts\Collection\IncludesInterface;
use Atournayre\Contracts\Collection\IndexInterface;
use Atournayre\Contracts\Collection\InInterface;
use Atournayre\Contracts\Collection\InsertAfterInterface;
use Atournayre\Contracts\Collection\InsertAtInterface;
use Atournayre\Contracts\Collection\InsertBeforeInterface;
use Atournayre\Contracts\Collection\IntersectAssocInterface;
use Atournayre\Contracts\Collection\IntersectInterface;
use Atournayre\Contracts\Collection\IntersectKeysInterface;
use Atournayre\Contracts\Collection\IntInterface;
use Atournayre\Contracts\Collection\IsEmptyInterface;
use Atournayre\Contracts\Collection\IsInterface;
use Atournayre\Contracts\Collection\IsNumericInterface;
use Atournayre\Contracts\Collection\IsObjectInterface;
use Atournayre\Contracts\Collection\IsScalarInterface;
use Atournayre\Contracts\Collection\JoinInterface;
use Atournayre\Contracts\Collection\JsonSerializeInterface;
use Atournayre\Contracts\Collection\KeysInterface;
use Atournayre\Contracts\Collection\KrsortInterface;
use Atournayre\Contracts\Collection\KsortInterface;
use Atournayre\Contracts\Collection\LastInterface;
use Atournayre\Contracts\Collection\LastKeyInterface;
use Atournayre\Contracts\Collection\LtrimInterface;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Contracts\Collection\MaxInterface;
use Atournayre\Contracts\Collection\MergeInterface;
use Atournayre\Contracts\Collection\MinInterface;
use Atournayre\Contracts\Collection\NoneInterface;
use Atournayre\Contracts\Collection\NthInterface;
use Atournayre\Contracts\Collection\OffsetExistsInterface;
use Atournayre\Contracts\Collection\OffsetGetInterface;
use Atournayre\Contracts\Collection\OffsetSetInterface;
use Atournayre\Contracts\Collection\OffsetUnsetInterface;
use Atournayre\Contracts\Collection\OnlyInterface;
use Atournayre\Contracts\Collection\OrderInterface;
use Atournayre\Contracts\Collection\PadInterface;
use Atournayre\Contracts\Collection\PartitionInterface;
use Atournayre\Contracts\Collection\PipeInterface;
use Atournayre\Contracts\Collection\PluckInterface;
use Atournayre\Contracts\Collection\PopInterface;
use Atournayre\Contracts\Collection\PosInterface;
use Atournayre\Contracts\Collection\PrefixInterface;
use Atournayre\Contracts\Collection\PrependInterface;
use Atournayre\Contracts\Collection\PullInterface;
use Atournayre\Contracts\Collection\PushInterface;
use Atournayre\Contracts\Collection\PutInterface;
use Atournayre\Contracts\Collection\RandomInterface;
use Atournayre\Contracts\Collection\ReduceInterface;
use Atournayre\Contracts\Collection\RejectInterface;
use Atournayre\Contracts\Collection\RekeyInterface;
use Atournayre\Contracts\Collection\RemoveInterface;
use Atournayre\Contracts\Collection\ReplaceInterface;
use Atournayre\Contracts\Collection\ReverseInterface;
use Atournayre\Contracts\Collection\RsortInterface;
use Atournayre\Contracts\Collection\RtrimInterface;
use Atournayre\Contracts\Collection\SearchInterface;
use Atournayre\Contracts\Collection\SepInterface;
use Atournayre\Contracts\Collection\SetInterface;
use Atournayre\Contracts\Collection\ShiftInterface;
use Atournayre\Contracts\Collection\ShuffleInterface;
use Atournayre\Contracts\Collection\SkipInterface;
use Atournayre\Contracts\Collection\SliceInterface;
use Atournayre\Contracts\Collection\SomeInterface;
use Atournayre\Contracts\Collection\SortInterface;
use Atournayre\Contracts\Collection\SpliceInterface;
use Atournayre\Contracts\Collection\StrAfterInterface;
use Atournayre\Contracts\Collection\StrBeforeInterface;
use Atournayre\Contracts\Collection\StrContainsAllInterface;
use Atournayre\Contracts\Collection\StrContainsInterface;
use Atournayre\Contracts\Collection\StrEndsAllInterface;
use Atournayre\Contracts\Collection\StrEndsInterface;
use Atournayre\Contracts\Collection\StringInterface;
use Atournayre\Contracts\Collection\StrLowerInterface;
use Atournayre\Contracts\Collection\StrReplaceInterface;
use Atournayre\Contracts\Collection\StrStartsAllInterface;
use Atournayre\Contracts\Collection\StrStartsInterface;
use Atournayre\Contracts\Collection\StrUpperInterface;
use Atournayre\Contracts\Collection\SuffixInterface;
use Atournayre\Contracts\Collection\SumInterface;
use Atournayre\Contracts\Collection\TakeInterface;
use Atournayre\Contracts\Collection\TapInterface;
use Atournayre\Contracts\Collection\ToArrayInterface;
use Atournayre\Contracts\Collection\ToJsonInterface;
use Atournayre\Contracts\Collection\ToUrlInterface;
use Atournayre\Contracts\Collection\TransposeInterface;
use Atournayre\Contracts\Collection\TraverseInterface;
use Atournayre\Contracts\Collection\TreeInterface;
use Atournayre\Contracts\Collection\TrimInterface;
use Atournayre\Contracts\Collection\UasortInterface;
use Atournayre\Contracts\Collection\UksortInterface;
use Atournayre\Contracts\Collection\UnionInterface;
use Atournayre\Contracts\Collection\UniqueInterface;
use Atournayre\Contracts\Collection\UnshiftInterface;
use Atournayre\Contracts\Collection\UsortInterface;
use Atournayre\Contracts\Collection\ValuesInterface;
use Atournayre\Contracts\Collection\WalkInterface;
use Atournayre\Contracts\Collection\WhereInterface;
use Atournayre\Contracts\Collection\WithInterface;
use Atournayre\Contracts\Collection\ZipInterface;
use Atournayre\Primitives\Traits\Collection\Add;
use Atournayre\Primitives\Traits\Collection\After;
use Atournayre\Primitives\Traits\Collection\All;
use Atournayre\Primitives\Traits\Collection\Arsort;
use Atournayre\Primitives\Traits\Collection\Asort;
use Atournayre\Primitives\Traits\Collection\At;
use Atournayre\Primitives\Traits\Collection\AtLeastOneElement;
use Atournayre\Primitives\Traits\Collection\Avg;
use Atournayre\Primitives\Traits\Collection\Before;
use Atournayre\Primitives\Traits\Collection\Bool_;
use Atournayre\Primitives\Traits\Collection\Call;
use Atournayre\Primitives\Traits\Collection\Cast;
use Atournayre\Primitives\Traits\Collection\Chunk;
use Atournayre\Primitives\Traits\Collection\Clear;
use Atournayre\Primitives\Traits\Collection\Clone_;
use Atournayre\Primitives\Traits\Collection\Col;
use Atournayre\Primitives\Traits\Collection\Collapse;
use Atournayre\Primitives\Traits\Collection\Combine;
use Atournayre\Primitives\Traits\Collection\Compare;
use Atournayre\Primitives\Traits\Collection\Concat;
use Atournayre\Primitives\Traits\Collection\Contains;
use Atournayre\Primitives\Traits\Collection\Copy;
use Atournayre\Primitives\Traits\Collection\Count;
use Atournayre\Primitives\Traits\Collection\CountBy;
use Atournayre\Primitives\Traits\Collection\Dd;
use Atournayre\Primitives\Traits\Collection\Delimiter;
use Atournayre\Primitives\Traits\Collection\Diff;
use Atournayre\Primitives\Traits\Collection\DiffAssoc;
use Atournayre\Primitives\Traits\Collection\DiffKeys;
use Atournayre\Primitives\Traits\Collection\Dump;
use Atournayre\Primitives\Traits\Collection\Duplicates;
use Atournayre\Primitives\Traits\Collection\Each;
use Atournayre\Primitives\Traits\Collection\Empty_;
use Atournayre\Primitives\Traits\Collection\Equals;
use Atournayre\Primitives\Traits\Collection\Every;
use Atournayre\Primitives\Traits\Collection\Except;
use Atournayre\Primitives\Traits\Collection\Explode;
use Atournayre\Primitives\Traits\Collection\Filter;
use Atournayre\Primitives\Traits\Collection\Find;
use Atournayre\Primitives\Traits\Collection\First;
use Atournayre\Primitives\Traits\Collection\FirstKey;
use Atournayre\Primitives\Traits\Collection\Flat;
use Atournayre\Primitives\Traits\Collection\Flip;
use Atournayre\Primitives\Traits\Collection\Float_;
use Atournayre\Primitives\Traits\Collection\From;
use Atournayre\Primitives\Traits\Collection\FromJson;
use Atournayre\Primitives\Traits\Collection\Get;
use Atournayre\Primitives\Traits\Collection\GetIterator;
use Atournayre\Primitives\Traits\Collection\Grep;
use Atournayre\Primitives\Traits\Collection\GroupBy;
use Atournayre\Primitives\Traits\Collection\Has;
use Atournayre\Primitives\Traits\Collection\HasNoElement;
use Atournayre\Primitives\Traits\Collection\HasOneElement;
use Atournayre\Primitives\Traits\Collection\HasSeveralElements;
use Atournayre\Primitives\Traits\Collection\HasXElements;
use Atournayre\Primitives\Traits\Collection\If_;
use Atournayre\Primitives\Traits\Collection\IfAny;
use Atournayre\Primitives\Traits\Collection\IfEmpty;
use Atournayre\Primitives\Traits\Collection\Implements_;
use Atournayre\Primitives\Traits\Collection\In;
use Atournayre\Primitives\Traits\Collection\Includes;
use Atournayre\Primitives\Traits\Collection\Index;
use Atournayre\Primitives\Traits\Collection\InsertAfter;
use Atournayre\Primitives\Traits\Collection\InsertAt;
use Atournayre\Primitives\Traits\Collection\InsertBefore;
use Atournayre\Primitives\Traits\Collection\Int_;
use Atournayre\Primitives\Traits\Collection\Intersect;
use Atournayre\Primitives\Traits\Collection\IntersectAssoc;
use Atournayre\Primitives\Traits\Collection\IntersectKeys;
use Atournayre\Primitives\Traits\Collection\Is;
use Atournayre\Primitives\Traits\Collection\IsEmpty;
use Atournayre\Primitives\Traits\Collection\IsNumeric;
use Atournayre\Primitives\Traits\Collection\IsObject;
use Atournayre\Primitives\Traits\Collection\IsScalar;
use Atournayre\Primitives\Traits\Collection\Join;
use Atournayre\Primitives\Traits\Collection\JsonSerialize;
use Atournayre\Primitives\Traits\Collection\Keys;
use Atournayre\Primitives\Traits\Collection\Krsort;
use Atournayre\Primitives\Traits\Collection\Ksort;
use Atournayre\Primitives\Traits\Collection\Last;
use Atournayre\Primitives\Traits\Collection\LastKey;
use Atournayre\Primitives\Traits\Collection\Ltrim;
use Atournayre\Primitives\Traits\Collection\Map;
use Atournayre\Primitives\Traits\Collection\Max;
use Atournayre\Primitives\Traits\Collection\Merge;
use Atournayre\Primitives\Traits\Collection\Min;
use Atournayre\Primitives\Traits\Collection\None;
use Atournayre\Primitives\Traits\Collection\Nth;
use Atournayre\Primitives\Traits\Collection\OffsetExists;
use Atournayre\Primitives\Traits\Collection\OffsetGet;
use Atournayre\Primitives\Traits\Collection\OffsetSet;
use Atournayre\Primitives\Traits\Collection\OffsetUnset;
use Atournayre\Primitives\Traits\Collection\Only;
use Atournayre\Primitives\Traits\Collection\Order;
use Atournayre\Primitives\Traits\Collection\Pad;
use Atournayre\Primitives\Traits\Collection\Partition;
use Atournayre\Primitives\Traits\Collection\Pipe;
use Atournayre\Primitives\Traits\Collection\Pluck;
use Atournayre\Primitives\Traits\Collection\Pop;
use Atournayre\Primitives\Traits\Collection\Pos;
use Atournayre\Primitives\Traits\Collection\Prefix;
use Atournayre\Primitives\Traits\Collection\Prepend;
use Atournayre\Primitives\Traits\Collection\Pull;
use Atournayre\Primitives\Traits\Collection\Push;
use Atournayre\Primitives\Traits\Collection\Put;
use Atournayre\Primitives\Traits\Collection\Random;
use Atournayre\Primitives\Traits\Collection\Reduce;
use Atournayre\Primitives\Traits\Collection\Reject;
use Atournayre\Primitives\Traits\Collection\Rekey;
use Atournayre\Primitives\Traits\Collection\Remove;
use Atournayre\Primitives\Traits\Collection\Replace;
use Atournayre\Primitives\Traits\Collection\Reverse;
use Atournayre\Primitives\Traits\Collection\Rsort;
use Atournayre\Primitives\Traits\Collection\Rtrim;
use Atournayre\Primitives\Traits\Collection\Search;
use Atournayre\Primitives\Traits\Collection\Sep;
use Atournayre\Primitives\Traits\Collection\Set;
use Atournayre\Primitives\Traits\Collection\Shift;
use Atournayre\Primitives\Traits\Collection\Shuffle;
use Atournayre\Primitives\Traits\Collection\Skip;
use Atournayre\Primitives\Traits\Collection\Slice;
use Atournayre\Primitives\Traits\Collection\Some;
use Atournayre\Primitives\Traits\Collection\Sort;
use Atournayre\Primitives\Traits\Collection\Splice;
use Atournayre\Primitives\Traits\Collection\StrAfter;
use Atournayre\Primitives\Traits\Collection\StrBefore;
use Atournayre\Primitives\Traits\Collection\StrContains;
use Atournayre\Primitives\Traits\Collection\StrContainsAll;
use Atournayre\Primitives\Traits\Collection\StrEnds;
use Atournayre\Primitives\Traits\Collection\StrEndsAll;
use Atournayre\Primitives\Traits\Collection\String_;
use Atournayre\Primitives\Traits\Collection\StrLower;
use Atournayre\Primitives\Traits\Collection\StrReplace;
use Atournayre\Primitives\Traits\Collection\StrStarts;
use Atournayre\Primitives\Traits\Collection\StrStartsAll;
use Atournayre\Primitives\Traits\Collection\StrUpper;
use Atournayre\Primitives\Traits\Collection\Suffix;
use Atournayre\Primitives\Traits\Collection\Sum;
use Atournayre\Primitives\Traits\Collection\Take;
use Atournayre\Primitives\Traits\Collection\Tap;
use Atournayre\Primitives\Traits\Collection\ToArray;
use Atournayre\Primitives\Traits\Collection\ToJson;
use Atournayre\Primitives\Traits\Collection\ToUrl;
use Atournayre\Primitives\Traits\Collection\Transpose;
use Atournayre\Primitives\Traits\Collection\Traverse;
use Atournayre\Primitives\Traits\Collection\Tree;
use Atournayre\Primitives\Traits\Collection\Trim;
use Atournayre\Primitives\Traits\Collection\Uasort;
use Atournayre\Primitives\Traits\Collection\Uksort;
use Atournayre\Primitives\Traits\Collection\Union;
use Atournayre\Primitives\Traits\Collection\Unique;
use Atournayre\Primitives\Traits\Collection\Unshift;
use Atournayre\Primitives\Traits\Collection\Usort;
use Atournayre\Primitives\Traits\Collection\Values;
use Atournayre\Primitives\Traits\Collection\Walk;
use Atournayre\Primitives\Traits\Collection\Where;
use Atournayre\Primitives\Traits\Collection\With;
use Atournayre\Primitives\Traits\Collection\Zip;

final readonly class Collection implements AddInterface, AllInterface, AtInterface, BoolInterface, CallInterface, FindInterface, FirstInterface, FirstKeyInterface, GetInterface, IndexInterface, IntInterface, FloatInterface, KeysInterface, LastInterface, LastKeyInterface, PopInterface, PosInterface, PullInterface, RandomInterface, SearchInterface, ShiftInterface, StringInterface, ToArrayInterface, UniqueInterface, ValuesInterface, ConcatInterface, InsertAfterInterface, InsertAtInterface, InsertBeforeInterface, MergeInterface, PadInterface, PrependInterface, PushInterface, PutInterface, SetInterface, UnionInterface, UnshiftInterface, WithInterface, AvgInterface, MaxInterface, MinInterface, SumInterface, CountInterface, CountByInterface, AtLeastOneElementInterface, HasSeveralElementsInterface, HasNoElementInterface, HasOneElementInterface, HasXElementsInterface, CloneInterface, CopyInterface, ExplodeInterface, FromInterface, FromJsonInterface, TreeInterface, DdInterface, DumpInterface, TapInterface, DelimiterInterface, GetIteratorInterface, JsonSerializeInterface, OffsetExistsInterface, OffsetGetInterface, OffsetSetInterface, OffsetUnsetInterface, SepInterface, ArsortInterface, AsortInterface, KrsortInterface, KsortInterface, OrderInterface, ReverseInterface, RsortInterface, ShuffleInterface, SortInterface, UasortInterface, UksortInterface, UsortInterface, AfterInterface, BeforeInterface, ClearInterface, DiffInterface, DiffAssocInterface, DiffKeysInterface, ExceptInterface, FilterInterface, GrepInterface, IntersectInterface, IntersectAssocInterface, IntersectKeysInterface, NthInterface, OnlyInterface, RejectInterface, RemoveInterface, SkipInterface, SliceInterface, TakeInterface, WhereInterface, CompareInterface, ContainsInterface, EachInterface, EmptyInterface, EqualsInterface, EveryInterface, HasInterface, IfInterface, IfAnyInterface, IfEmptyInterface, InInterface, IncludesInterface, IsInterface, IsEmptyInterface, IsNumericInterface, IsObjectInterface, IsScalarInterface, ImplementsInterface, NoneInterface, SomeInterface, StrContainsInterface, StrContainsAllInterface, StrEndsInterface, StrEndsAllInterface, StrStartsInterface, StrStartsAllInterface, StrBeforeInterface, CastInterface, ChunkInterface, ColInterface, CollapseInterface, CombineInterface, FlatInterface, FlipInterface, GroupByInterface, JoinInterface, LtrimInterface, MapInterface, PartitionInterface, PipeInterface, PluckInterface, PrefixInterface, ReduceInterface, RekeyInterface, ReplaceInterface, RtrimInterface, SpliceInterface, StrAfterInterface, StrLowerInterface, StrReplaceInterface, StrUpperInterface, SuffixInterface, ToJsonInterface, ToUrlInterface, TransposeInterface, TraverseInterface, TrimInterface, WalkInterface, ZipInterface, DuplicatesInterface
{
    use Add;
    use After;
    use All;
    use Arsort;
    use Asort;
    use At;
    use AtLeastOneElement;
    use Avg;
    use Before;
    use Bool_;
    use Call;
    use Cast;
    use Chunk;
    use Clear;
    use Clone_;
    use Col;
    use Collapse;
    use Combine;
    use Compare;
    use Concat;
    use Contains;
    use Copy;
    use Count;
    use CountBy;
    use Dd;
    use Delimiter;
    use Diff;
    use DiffAssoc;
    use DiffKeys;
    use Dump;
    use Duplicates;
    use Each;
    use Empty_;
    use Equals;
    use Every;
    use Except;
    use Explode;
    use Filter;
    use Find;
    use First;
    use FirstKey;
    use Flat;
    use Flip;
    use Float_;
    use From;
    use FromJson;
    use Get;
    use GetIterator;
    use Grep;
    use GroupBy;
    use Has;
    use HasNoElement;
    use HasOneElement;
    use HasSeveralElements;
    use HasXElements;
    use If_;
    use IfAny;
    use IfEmpty;
    use Implements_;
    use In;
    use Includes;
    use Index;
    use InsertAfter;
    use InsertAt;
    use InsertBefore;
    use Int_;
    use Intersect;
    use IntersectAssoc;
    use IntersectKeys;
    use Is;
    use IsEmpty;
    use IsNumeric;
    use IsObject;
    use IsScalar;
    use Join;
    use JsonSerialize;
    use Keys;
    use Krsort;
    use Ksort;
    use Last;
    use LastKey;
    use Ltrim;
    use Map;
    use Max;
    use Merge;
    use Min;
    use None;
    use Nth;
    use OffsetExists;
    use OffsetGet;
    use OffsetSet;
    use OffsetUnset;
    use Only;
    use Order;
    use Pad;
    use Partition;
    use Pipe;
    use Pluck;
    use Pop;
    use Pos;
    use Prefix;
    use Prepend;
    use Pull;
    use Push;
    use Put;
    use Random;
    use Reduce;
    use Reject;
    use Rekey;
    use Remove;
    use Replace;
    use Reverse;
    use Rsort;
    use Rtrim;
    use Search;
    use Sep;
    use Set;
    use Shift;
    use Shuffle;
    use Skip;
    use Slice;
    use Some;
    use Sort;
    use Splice;
    use StrAfter;
    use StrBefore;
    use StrContains;
    use StrContainsAll;
    use StrEnds;
    use StrEndsAll;
    use String_;
    use StrLower;
    use StrReplace;
    use StrStarts;
    use StrStartsAll;
    use StrUpper;
    use Suffix;
    use Sum;
    use Take;
    use Tap;
    use ToArray;
    use ToJson;
    use ToUrl;
    use Transpose;
    use Traverse;
    use Tree;
    use Trim;
    use Uasort;
    use Uksort;
    use Union;
    use Unique;
    use Unshift;
    use Usort;
    use Values;
    use Walk;
    use Where;
    use With;
    use Zip;

    private function __construct(
        private AimeosMap $collection,
        private BoolEnum $isReadOnly,
    ) {
    }

    /**
     * @param array<int|string, mixed>|Collection|AimeosMap|string|null $collection
     *
     * @api
     */
    public static function readOnly(Collection|AimeosMap|array|string|null $collection = []): self
    {
        return self::of($collection)
            ->asReadOnly()
        ;
    }

    /**
     * @api
     */
    public function asReadOnly(): self
    {
        return new self(
            collection: AimeosMap::from($this->collection),
            isReadOnly: BoolEnum::fromBool(true),
        );
    }

    /**
     * @param array<int|string, mixed>|Collection|AimeosMap|string|null $collection
     *
     * @api
     */
    public static function of(Collection|AimeosMap|array|string|null $collection = []): self
    {
        return match (true) {
            $collection instanceof Collection => $collection,
            is_string($collection) => new self(
                collection: AimeosMap::from([$collection]),
                isReadOnly: BoolEnum::fromBool(false),
            ),
            $collection instanceof AimeosMap => new self(
                collection: $collection,
                isReadOnly: BoolEnum::fromBool(false),
            ),
            default => new self(
                collection: AimeosMap::from($collection ?? []),
                isReadOnly: BoolEnum::fromBool(false),
            ),
        };
    }

    public function isReadOnly(): BoolEnum
    {
        return $this->isReadOnly;
    }
}
