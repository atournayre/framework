<?php

declare(strict_types=1);

use Atournayre\Rector\Rules\ReplaceTraitUseByAliasNameRector;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;

return static function (RectorConfig $rectorConfig) : void {
    $rectorConfig->sets([
        __DIR__ . '/2.7.0.php',
    ]);
    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
        'Atournayre\Primitives\Traits\CollectionTrait' => 'Atournayre\Primitives\Traits\Collection as Collection_',
        'Atournayre\Contracts\Collection\MapInterface' => 'Atournayre\Contracts\Collection\AsMapInterface',
        'Atournayre\Contracts\Collection\ListInterface' => 'Atournayre\Contracts\Collection\AsListInterface',
    ]);
    $rectorConfig->ruleWithConfiguration(ReplaceTraitUseByAliasNameRector::class, [
        ReplaceTraitUseByAliasNameRector::OLD_TRAIT_NAME => 'Atournayre\Primitives\Traits\CollectionTrait',
        ReplaceTraitUseByAliasNameRector::NEW_TRAIT_NAME => 'Atournayre\Primitives\Traits\Collection',
        ReplaceTraitUseByAliasNameRector::NEW_ALIAS_NAME => 'Collection_',
        ReplaceTraitUseByAliasNameRector::SHORT_NAME_TO_REPLACE => 'Collection',
    ]);
};

