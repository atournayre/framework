<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Types;

use Atournayre\Common\Types\DirectoryOrFile;
use PHPUnit\Framework\TestCase;

final class DirectoryOrFileTest extends TestCase
{
    public function testSuffixWith(): void
    {
        $directoryOrFile = DirectoryOrFile::of('/path/to/directory');
        $newDirectoryOrFile = $directoryOrFile->suffixWith('suffix.txt');

        self::assertSame('/path/to/directory/suffix.txt', $newDirectoryOrFile->toString());
    }

    public function testPrefixWith(): void
    {
        $directoryOrFile = DirectoryOrFile::of('/path/to/directory');
        $newDirectoryOrFile = $directoryOrFile->prefixWith('prefix');

        self::assertSame('/prefix/path/to/directory', $newDirectoryOrFile->toString());
    }

    public function testToString(): void
    {
        $directoryOrFile = DirectoryOrFile::of('/path/to/directory');

        self::assertSame('/path/to/directory', $directoryOrFile->toString());
    }

    public function testSuffixWithExtraSlashes(): void
    {
        $directoryOrFile = DirectoryOrFile::of('/path/to/directory');
        $newDirectoryOrFile = $directoryOrFile->suffixWith('/suffix.txt');

        self::assertSame('/path/to/directory/suffix.txt', $newDirectoryOrFile->toString());
    }

    public function testDirectoryWithoutStratingSlashThrowAnException(): void
    {
        self::expectException(\InvalidArgumentException::class);
        DirectoryOrFile::of('path/to/directory');
    }

    public function testPrefixWithExtraSlashes(): void
    {
        $directoryOrFile = DirectoryOrFile::of('/path/to/directory');
        $newDirectoryOrFile = $directoryOrFile->prefixWith('/prefix/');

        self::assertSame('/prefix/path/to/directory', $newDirectoryOrFile->toString());
    }
}
