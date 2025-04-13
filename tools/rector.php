<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\IncreaseDeclareStrictTypesRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/../src',
        __DIR__.'/../tests',
    ])
    ->withSkip([
        __DIR__ . '/../src/Rector/Sets.php',
    ])
    ->withPhpSets(
        php82: \true,
    )
    ->withPreparedSets(
        \true, // Enable dead code set
        \true, // Enable code quality set
        \true, // Enable coding style set
        \false,
        \true, // Enable privatization set
        \false,
        \false,
        \true, // Enable early return set
        \false
    )
    ->withImportNames(
        \true,
        \true,
        \false,
        \true
    )
    ->withRootFiles()
    ->withConfiguredRule(IncreaseDeclareStrictTypesRector::class, [
        'limit' => 10,
    ])
    ;
