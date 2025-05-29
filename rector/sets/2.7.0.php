<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;

return static function (RectorConfig $rectorConfig) : void {
    $rectorConfig->ruleWithConfiguration(RenameMethodRector::class, [
        new MethodCallRename(
            'Atournayre\Contracts\Security\SecurityInterface',
            'getUser',
            'user'
        ),
        new MethodCallRename(
            'Atournayre\Wrapper\SplFileInfo',
            'getRelativePath',
            'relativePath'
        ),
        new MethodCallRename(
            'Atournayre\Wrapper\SplFileInfo',
            'getRelativePathname',
            'relativePathname'
        ),
        new MethodCallRename(
            'Atournayre\Wrapper\SplFileInfo',
            'getFilenameWithoutExtension',
            'filenameWithoutExtension'
        ),
        new MethodCallRename(
            'Atournayre\Wrapper\SplFileInfo',
            'getContents',
            'contents'
        ),
        new MethodCallRename(
            'Atournayre\Wrapper\SplFileInfo',
            'getExtension',
            'extension'
        ),
        new MethodCallRename(
            'Atournayre\Wrapper\SplFileInfo',
            'getSize',
            'size'
        ),
        new MethodCallRename(
            'Atournayre\Wrapper\SplFileInfo',
            'getFilename',
            'filename'
        ),
        new MethodCallRename(
            'Atournayre\Wrapper\SplFileInfo',
            'getPathname',
            'pathname'
        ),
    ]);
};
