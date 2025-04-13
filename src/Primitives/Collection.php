<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Aimeos\Map as AimeosMap;
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
use Atournayre\Primitives\Traits\Collection\Access;
use Atournayre\Primitives\Traits\Collection\Add;
use Atournayre\Primitives\Traits\Collection\Aggregate;
use Atournayre\Primitives\Traits\Collection\Countable;
use Atournayre\Primitives\Traits\Collection\Create;
use Atournayre\Primitives\Traits\Collection\Debug;
use Atournayre\Primitives\Traits\Collection\Misc;
use Atournayre\Primitives\Traits\Collection\Ordering;
use Atournayre\Primitives\Traits\Collection\Shorten;
use Atournayre\Primitives\Traits\Collection\Test;
use Atournayre\Primitives\Traits\Collection\Transform;

final class Collection implements AllInterface, AtInterface, BoolInterface, CallInterface, FindInterface, FirstInterface, FirstKeyInterface, GetInterface, IndexInterface, IntInterface, FloatInterface, KeysInterface, LastInterface, LastKeyInterface, PopInterface, PosInterface, PullInterface, RandomInterface, SearchInterface, ShiftInterface, StringInterface, ToArrayInterface, UniqueInterface, ValuesInterface, ConcatInterface, InsertAfterInterface, InsertAtInterface, InsertBeforeInterface, MergeInterface, PadInterface, PrependInterface, PushInterface, PutInterface, SetInterface, UnionInterface, UnshiftInterface, WithInterface, AvgInterface, MaxInterface, MinInterface, SumInterface, CountInterface, CountByInterface, AtLeastOneElementInterface, HasSeveralElementsInterface, HasNoElementInterface, HasOneElementInterface, HasXElementsInterface, CloneInterface, CopyInterface, ExplodeInterface, FromInterface, FromJsonInterface, TreeInterface, DdInterface, DumpInterface, TapInterface, DelimiterInterface, GetIteratorInterface, JsonSerializeInterface, OffsetExistsInterface, OffsetGetInterface, OffsetSetInterface, OffsetUnsetInterface, SepInterface, ArsortInterface, AsortInterface, KrsortInterface, KsortInterface, OrderInterface, ReverseInterface, RsortInterface, ShuffleInterface, SortInterface, UasortInterface, UksortInterface, UsortInterface, AfterInterface, BeforeInterface, ClearInterface, DiffInterface, DiffAssocInterface, DiffKeysInterface, ExceptInterface, FilterInterface, GrepInterface, IntersectInterface, IntersectAssocInterface, IntersectKeysInterface, NthInterface, OnlyInterface, RejectInterface, RemoveInterface, SkipInterface, SliceInterface, TakeInterface, WhereInterface, CompareInterface, ContainsInterface, EachInterface, EmptyInterface, EqualsInterface, EveryInterface, HasInterface, IfInterface, IfAnyInterface, IfEmptyInterface, InInterface, IncludesInterface, IsInterface, IsEmptyInterface, IsNumericInterface, IsObjectInterface, IsScalarInterface, ImplementsInterface, NoneInterface, SomeInterface, StrContainsInterface, StrContainsAllInterface, StrEndsInterface, StrEndsAllInterface, StrStartsInterface, StrStartsAllInterface, StrBeforeInterface, CastInterface, ChunkInterface, ColInterface, CollapseInterface, CombineInterface, FlatInterface, FlipInterface, GroupByInterface, JoinInterface, LtrimInterface, MapInterface, PartitionInterface, PipeInterface, PluckInterface, PrefixInterface, ReduceInterface, RekeyInterface, ReplaceInterface, RtrimInterface, SpliceInterface, StrAfterInterface, StrLowerInterface, StrReplaceInterface, StrUpperInterface, SuffixInterface, ToJsonInterface, ToUrlInterface, TransposeInterface, TraverseInterface, TrimInterface, WalkInterface, ZipInterface, DuplicatesInterface
{
    use Access;
    use Add;
    use Aggregate;
    use Countable;
    use Create;
    use Debug;
    use Misc;
    use Ordering;
    use Shorten;
    use Test;
    use Transform;

    private function __construct(
        private readonly AimeosMap $collection,
        private readonly BoolEnum $isReadOnly,
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
