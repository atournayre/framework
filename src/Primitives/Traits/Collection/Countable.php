<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait Countable.
 */
trait Countable
{
    use Count;
    use CountBy;
    use AtLeastOneElement;
    use HasSeveralElements;
    use HasNoElement;
    use HasOneElement;
    use HasXElements;
}
