<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\IncreaseDeclareStrictTypesRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/../src',
        __DIR__.'/../tests',
    ])
    ->withPhpSets(
        \false,
        \false,
        \false,
        \false,
        \true, // Enable PHP 7.4 set
        \false,
        \false,
        \false,
        \false,
        \false,
        \false,
        \false,
        \false,
        \false
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
