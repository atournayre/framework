<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait Transform.
 */
trait Transform
{
    use Cast;
    use Chunk;
    use Col;
    use Collapse;
    use Combine;
    use Flat;
    use Flip;
    use GroupBy;
    use Join;
    use Ltrim;
    use Map;
    use Partition;
    use Pipe;
    use Pluck;
    use Prefix;
    use Reduce;
    use Rekey;
    use Replace;
    use Rtrim;
    use Splice;
    use StrAfter;
    use StrLower;
    use StrReplace;
    use StrUpper;
    use Suffix;
    use ToJson;
    use ToUrl;
    use Transpose;
    use Traverse;
    use Trim;
    use Walk;
    use Zip;
    use Duplicates;
}
