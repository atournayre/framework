<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait Aggregate.
 */
trait Aggregate
{
    use Avg;
    use Max;
    use Min;
    use Sum;
}
