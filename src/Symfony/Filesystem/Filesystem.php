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

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final readonly class Filesystem implements FilesystemInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(
        private DirectoryOrFile $directoryOrFile,
        private Finder $finder,
        private SymfonyFilesystem $filesystem,
    ) {
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function from(string $directoryOrFile): self
    {
        return new self(
            directoryOrFile: DirectoryOrFile::of($directoryOrFile),
            finder: new Finder(),
            filesystem: new SymfonyFilesystem(),
        );
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function createDirectory(string $directory): void
    {
        $directoryToCreate = $this->concatWithDirectoryOrFile($directory);

        $this
            ->filesystem
            ->mkdir($directoryToCreate)
        ;
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function concatWithDirectoryOrFile(string $directoryOrFile): string
    {
        return $this->directoryOrFile
            ->prefixWith($directoryOrFile)
            ->toString()
        ;
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function removeDirectory(string $directory): void
    {
        $directoryToRemove = $this->concatWithDirectoryOrFile($directory);

        $this
            ->filesystem
            ->remove($directoryToRemove)
        ;
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function removeFile(string $file): void
    {
        $fileToRemove = $this->concatWithDirectoryOrFile($file);

        $this
            ->filesystem
            ->remove($fileToRemove)
        ;
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function moveDirectory(string $source, string $destination): void
    {
        $this->moveFile($source, $destination);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function renameFile(string $source, string $destination): void
    {
        $this->moveFile($source, $destination);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function renameDirectory(string $source, string $destination): void
    {
        $this->moveFile($source, $destination);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function exists(): BoolEnum
    {
        $exists = $this
            ->filesystem
            ->exists($this->directoryOrFile->toString())
        ;

        return BoolEnum::fromBool($exists);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isFile(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isFile = \is_file($filename);

        return BoolEnum::fromBool($isFile);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isDirectory(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isDir = \is_dir($filename);

        return BoolEnum::fromBool($isDir);
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isEmpty(): BoolEnum
    {
        $isEmpty = $this->listFiles()->hasNoElement()->isTrue()
            && $this->listDirectories()->hasNoElement()->isTrue();

        return BoolEnum::fromBool($isEmpty);
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function listDirectories(): FileCollection
    {
        $finder = $this->finder
            ->directories()
            ->in($this->directoryOrFile->toString())
        ;
        $files = $this->fromIteratorToSplFileInfos($finder);

        return FileCollection::asMap($files);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isReadable(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isReadable = \is_readable($filename);

        return BoolEnum::fromBool($isReadable);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isWritable(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isWritable = \is_writable($filename);

        return BoolEnum::fromBool($isWritable);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isExecutable(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isExecutable = \is_executable($filename);

        return BoolEnum::fromBool($isExecutable);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isLink(): BoolEnum
    {
        $filename = $this->directoryOrFile->toString();
        $isLink = \is_link($filename);

        return BoolEnum::fromBool($isLink);
    }
}
