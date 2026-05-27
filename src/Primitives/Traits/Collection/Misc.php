<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait Misc.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Misc
{
    use Delimiter;
    use GetIterator;
    use JsonSerialize;
    use OffsetExists;
    use OffsetGet;
    use OffsetSet;
    use OffsetUnset;
    use Sep;
}
