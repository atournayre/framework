<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Filesystem;

use Atournayre\Common\Types\DirectoryOrFile;
use Atournayre\Contracts\Filesystem\FilesystemInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Collection\FileCollection;
use Atournayre\Wrapper\SplFileInfo;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo as SymfonySplFileInfo;

final class Filesystem implements FilesystemInterface
{
    /** @api */
    public Finder $finder;

    /** @api */
    public SymfonyFilesystem $symfonyFilesystem;

    /** @api */
    public DirectoryOrFile $directoryOrFile;

    private function __construct(
        string $directoryOrFile
    ) {
        $this->directoryOrFile = DirectoryOrFile::of($directoryOrFile);
        $this->finder = new Finder();
        $this->symfonyFilesystem = new SymfonyFilesystem();
    }

    public static function from(string $directoryOrFile): self
    {
        return new self($directoryOrFile);
    }

    public function createDirectory(string $directory): void
    {
        $directoryToCreate = $this->concatWithDirectoryOrFile($directory);

        $this->symfonyFilesystem
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

        $this->symfonyFilesystem
            ->remove($directoryToRemove)
        ;
    }

    public function removeFile(string $file): void
    {
        $fileToRemove = $this->concatWithDirectoryOrFile($file);

        $this->symfonyFilesystem
            ->remove($fileToRemove)
        ;
    }

    public function createFile(string $file, string $content): void
    {
        $file = $this->directoryOrFile
            ->prefixWith($file)
            ->toString()
        ;

        $this->symfonyFilesystem
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

        $this->symfonyFilesystem
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

        $this->symfonyFilesystem
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

        $this->symfonyFilesystem
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
        $exists = $this->symfonyFilesystem
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
     * @throws \Exception
     */
    public function isNotEmpty(): BoolEnum
    {
        $isNotEmpty = $this->isEmpty()
            ->no()
        ;

        return BoolEnum::fromBool($isNotEmpty);
    }

    /**
     * @throws \Exception
     */
    public function isEmpty(): BoolEnum
    {
        $isEmpty = $this->listFiles()->hasNoElement()->isTrue()
            && $this->listDirectories()->hasNoElement()->isTrue();

        return BoolEnum::fromBool($isEmpty);
    }

    /**
     * @throws \Exception
     */
    public function countFiles(): int
    {
        return $this->listFiles()
            ->count()
            ->intValue()
        ;
    }

    /**
     * @throws \Exception
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
     * @throws \Exception
     */
    public function countDirectories(): int
    {
        return $this->listDirectories()
            ->count()
            ->intValue()
        ;
    }

    /**
     * @throws \Exception
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
