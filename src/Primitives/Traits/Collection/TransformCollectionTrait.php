<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait TransformCollectionTrait.
 */
trait TransformCollectionTrait
{
    use CastCollectionTrait;
    use ChunkCollectionTrait;
    use ColCollectionTrait;
    use CollapseCollectionTrait;
    use CombineCollectionTrait;
    use FlatCollectionTrait;
    use FlipCollectionTrait;
    use GroupByCollectionTrait;
    use JoinCollectionTrait;
    use LtrimCollectionTrait;
    use MapCollectionTrait;
    use PartitionCollectionTrait;
    use PipeCollectionTrait;
    use PluckCollectionTrait;
    use PrefixCollectionTrait;
    use ReduceCollectionTrait;
    use RekeyCollectionTrait;
    use ReplaceCollectionTrait;
    use RtrimCollectionTrait;
    use SpliceCollectionTrait;
    use StrAfterCollectionTrait;
    use StrLowerCollectionTrait;
    use StrReplaceCollectionTrait;
    use StrUpperCollectionTrait;
    use SuffixCollectionTrait;
    use ToJsonCollectionTrait;
    use ToUrlCollectionTrait;
    use TransposeCollectionTrait;
    use TraverseCollectionTrait;
    use TrimCollectionTrait;
    use WalkCollectionTrait;
    use ZipCollectionTrait;
    use DuplicatesCollectionTrait;
}
