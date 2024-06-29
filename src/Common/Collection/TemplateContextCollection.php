<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Primitives\Collection\CollectionTrait;
use Atournayre\Primitives\Collection\MapTrait;

final class TemplateContextCollection
{
    use CollectionTrait;
    use MapTrait;

    protected static string $type = 'mixed';
}
