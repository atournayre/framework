<?php

declare(strict_types=1);

namespace Atournayre\Traits;

use ArchTech\Enums\Comparable;
use ArchTech\Enums\From;
use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait EnumTrait
{
    use Comparable;
    use From;
    use InvokableCases;
    use Metadata;
    use Names;
    use Options;
    use Values;
}
