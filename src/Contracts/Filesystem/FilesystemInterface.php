<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Filesystem;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\FileCollection;

/**
 * @template T
 */
interface FilesystemInterface
{
    /**
     * @return self<T>
     */
    public static function from(string $directoryOrFile): self;

    public function createDirectory(string $directory): void;

    public function removeDirectory(string $directory): void;

    public function removeFile(string $file): void;

    public function createFile(string $file, string $content): void;

    public function copyFile(string $source, string $destination): void;

    public function copyDirectory(string $source, string $destination): void;

    public function moveFile(string $source, string $destination): void;

    public function moveDirectory(string $source, string $destination): void;

    public function renameFile(string $source, string $destination): void;

    public function renameDirectory(string $source, string $destination): void;

    public function exists(): BoolEnum;

    public function isFile(): BoolEnum;

    public function isDirectory(): BoolEnum;

    public function isNotEmpty(): BoolEnum;

    public function isEmpty(): BoolEnum;

    public function countFiles(): int;

    /**
     * @return FileCollection<T>
     */
    public function listFiles(): FileCollection;

    public function countDirectories(): int;

    /**
     * @return FileCollection<T>
     */
    public function listDirectories(): FileCollection;

    public function isReadable(): BoolEnum;

    public function isWritable(): BoolEnum;

    public function isExecutable(): BoolEnum;

    public function isLink(): BoolEnum;
}
