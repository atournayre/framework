<?php

declare(strict_types=1);

namespace Atournayre\Wrapper;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\Types\File\Content;
use Atournayre\Common\Types\File\Extension;
use Atournayre\Common\Types\File\Filename;
use Atournayre\Common\Types\File\Path;
use Atournayre\Common\VO\Memory;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\StringType;
use Symfony\Component\Finder\SplFileInfo as SymfonySplFileInfo;

final readonly class SplFileInfo implements LoggableInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private function __construct(
        private SymfonySplFileInfo $splFileInfo,
    ) {
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function of(string $file, string $relativePath, string $relativePathname): self
    {
        $splFileInfo = new SymfonySplFileInfo($file, $relativePath, $relativePathname);

        return new self($splFileInfo);
    }

    /**
     * @return array<string, mixed>
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toLog(): array
    {
        return [
            'pathname' => $this->pathname(),
            'size' => $this->size()->humanReadable(),
        ];
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function relativePath(): Path
    {
        $relativePath = $this->splFileInfo->getRelativePath();

        return Path::of($relativePath);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function relativePathname(): Path
    {
        $relativePathname = $this->splFileInfo->getRelativePathname();

        return Path::of($relativePathname);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function filenameWithoutExtension(): StringType
    {
        $filename = $this->splFileInfo->getFilenameWithoutExtension();

        return StringType::of($filename);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function contents(): Content
    {
        $contents = $this->splFileInfo->getContents();

        return Content::of($contents);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function extension(): Extension
    {
        $extension = $this->splFileInfo->getExtension();

        return Extension::of($extension);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function size(): Memory
    {
        $size = $this->splFileInfo->getSize();

        Assert::notFalse($size, 'The file size is not available.');

        return Memory::fromBytes($size);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function filename(): Filename
    {
        $filename = $this->splFileInfo->getFilename();

        return Filename::of($filename);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function pathname(): Path
    {
        $pathname = $this->splFileInfo->getPathname();

        return Path::of($pathname);
    }
}
