<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait MiscCollectionTrait.
 */
trait MiscCollectionTrait
{
    use DelimiterCollectionTrait;
    use GetIteratorCollectionTrait;
    use JsonSerializeCollectionTrait;
    use OffsetExistsCollectionTrait;
    use OffsetGetCollectionTrait;
    use OffsetSetCollectionTrait;
    use OffsetUnsetCollectionTrait;
    use SepCollectionTrait;
}
