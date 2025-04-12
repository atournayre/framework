<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;

return RectorConfig::configure()
    ->withPaths([
        '%currentWorkingDirectory%/src',
    ])
    ->withConfiguredRule(RenameClassRector::class, [
        'Atournayre\Primitives\Traits\Collection\OrderCollectionTrait' => 'Atournayre\Primitives\Traits\Collection\OrderingCollectionTrait',
    ])
;
