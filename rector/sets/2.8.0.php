<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;

return static function (RectorConfig $rectorConfig) : void {
    $rectorConfig->sets([
        __DIR__ . '/2.7.0.php',
    ]);
    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
        'Atournayre\Primitives\Traits\CollectionTrait' => 'Atournayre\Primitives\Traits\Collection',
    ]);
};

