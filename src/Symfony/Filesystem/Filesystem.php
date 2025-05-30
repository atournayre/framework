<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Filesystem;

use Atournayre\Common\Types\DirectoryOrFile;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Filesystem\FilesystemInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Collection\FileCollection;
use Atournayre\Wrapper\SplFileInfo;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo as SymfonySplFileInfo;

final readonly class Filesystem implements FilesystemInterface
{
    private function __construct(
        private DirectoryOrFile $directoryOrFile,
        private Finder $finder,
        private SymfonyFilesystem $filesystem,
    ) {
    }

    public static function from(string $directoryOrFile): self
    {
        return new self(
            directoryOrFile: DirectoryOrFile::of($directoryOrFile),
            finder: new Finder(),
            filesystem: new SymfonyFilesystem(),
        );
    }

    public function createDirectory(string $directory): void
    {
        $directoryToCreate = $this->concatWithDirectoryOrFile($directory);

        $this
            ->filesystem
            ->mkdir($directoryToCreate)
        ;
    }

    private function concatWithDirectoryOrFile(string $directoryOrFile): string
    {
        return $this->directoryOrFile
            ->prefixWith($directoryOrFile)
            ->toString()
        ;
    }

    public function removeDirectory(string $directory): void
    {
        $directoryToRemove = $this->concatWithDirectoryOrFile($directory);

        $this
            ->filesystem
            ->remove($directoryToRemove)
        ;
    }

    public function removeFile(string $file): void
    {
        $fileToRemove = $this->concatWithDirectoryOrFile($file);

        $this
            ->filesystem
            ->remove($fileToRemove)
        ;
    }

    public function createFile(string $file, string $content): void
    {
        $file = $this->directoryOrFile
            ->prefixWith($file)
            ->toString()
        ;

        $this
            ->filesystem
            ->dumpFile($file, $content)
        ;
    }

    public function copyFile(string $source, string $destination): void
    {
        $source = $this->directoryOrFile
            ->prefixWith($source)
            ->toString()
        ;

        $destination = $this->directoryOrFile
            ->prefixWith($destination)
            ->toString()
        ;

        $this
            ->filesystem
            ->copy($source, $destination)
        ;
    }

    public function copyDirectory(string $source, string $destination): void
    {
        $source = $this->directoryOrFile
            ->prefixWith($source)
            ->toString()
        ;

        $destination = $this->directoryOrFile
            ->prefixWith($destination)
            ->toString()
        ;

        $this
            ->filesystem
            ->mirror($source, $destination)
        ;
    }

    public function moveFile(string $source, string $destination): void
    {
        $source = $this->directoryOrFile
            ->prefixWith($source)
            ->toString()
        ;

        $destination = $this->directoryOrFile
            ->prefixWith($destination)
            ->toString()
        ;

        $this
            ->filesystem
            ->rename($source, $destination)
        ;
    }

    public function moveDirectory(string $source, string $destination): void
    {
        $this->moveFile($source, $destination);
    }

    public function renameFile(string $source, string $destination): void
    {
        $this->moveFile($source, $destination);
    }

    public function renameDirectory(string $source, string $destination): void
    {
        $this->moveFile($source, $destination);
    }

    public function exists(): BoolEnum
    {
        $exists = $this
            ->filesystem
            ->exists($this->directoryOrFile->toString())
        ;

        return BoolEnum::fromBool($exists);
    }

    public function isFile(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isFile = \is_file($filename);

        return BoolEnum::fromBool($isFile);
    }

    public function isDirectory(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isDir = \is_dir($filename);

        return BoolEnum::fromBool($isDir);
    }

    /**
     * @throws ThrowableInterface
     */
    public function isNotEmpty(): BoolEnum
    {
        $isNotEmpty = $this->isEmpty()
            ->no()
        ;

        return BoolEnum::fromBool($isNotEmpty);
    }

    /**
     * @throws ThrowableInterface
     */
    public function isEmpty(): BoolEnum
    {
        $isEmpty = $this->listFiles()->hasNoElement()->isTrue()
            && $this->listDirectories()->hasNoElement()->isTrue();

        return BoolEnum::fromBool($isEmpty);
    }

    /**
     * @throws ThrowableInterface
     */
    public function countFiles(): int
    {
        return $this->listFiles()
            ->count()
            ->value()
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function listFiles(): FileCollection
    {
        $finder = $this->finder
            ->files()
            ->in($this->directoryOrFile->toString())
        ;
        $files = $this->fromIteratorToSplFileInfos($finder);

        return FileCollection::asMap($files);
    }

    /**
     * @param iterable<int|string, SymfonySplFileInfo> $files
     *
     * @return array<int|string, SplFileInfo>
     */
    private function fromIteratorToSplFileInfos(iterable $files): array
    {
        return Collection::of($files)
            ->map(static fn (SymfonySplFileInfo $file) => SplFileInfo::of(
                $file->getRealPath(),
                $file->getRelativePath(),
                $file->getRelativePathname()
            ))
            ->toArray()
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function countDirectories(): int
    {
        return $this->listDirectories()
            ->count()
            ->value()
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function listDirectories(): FileCollection
    {
        $finder = $this->finder
            ->directories()
            ->in($this->directoryOrFile->toString())
        ;
        $files = $this->fromIteratorToSplFileInfos($finder);

        return FileCollection::asMap($files);
    }

    public function isReadable(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isReadable = \is_readable($filename);

        return BoolEnum::fromBool($isReadable);
    }

    public function isWritable(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isWritable = \is_writable($filename);

        return BoolEnum::fromBool($isWritable);
    }

    public function isExecutable(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isExecutable = \is_executable($filename);

        return BoolEnum::fromBool($isExecutable);
    }

    public function isLink(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isLink = \is_link($filename);

        return BoolEnum::fromBool($isLink);
    }
}
