<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Persistance;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface DatabasePersistenceInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function persist(): self;

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function flush(): void;

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function remove(): self;
}
