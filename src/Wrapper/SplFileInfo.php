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
    private function __construct(
        private SymfonySplFileInfo $splFileInfo,
    )
    {
    }

    /**
     * @api
     */
    public static function of(string $file, string $relativePath, string $relativePathname): self
    {
        $splFileInfo = new SymfonySplFileInfo($file, $relativePath, $relativePathname);

        return new self($splFileInfo);
    }

    /**
     * @api
     */
    public function getRelativePath(): Path
    {
        $relativePath = $this->splFileInfo->getRelativePath();

        return Path::of($relativePath);
    }

    /**
     * @api
     */
    public function getRelativePathname(): Path
    {
        $relativePathname = $this->splFileInfo->getRelativePathname();

        return Path::of($relativePathname);
    }

    /**
     * @api
     */
    public function getFilenameWithoutExtension(): StringType
    {
        $filename = $this->splFileInfo->getFilenameWithoutExtension();

        return StringType::of($filename);
    }

    /**
     * @api
     */
    public function getContents(): Content
    {
        $contents = $this->splFileInfo->getContents();

        return Content::of($contents);
    }

    /**
     * @api
     */
    public function getExtension(): Extension
    {
        $extension = $this->splFileInfo->getExtension();

        return Extension::of($extension);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function getSize(): Memory
    {
        $size = $this->splFileInfo->getSize();

        Assert::notFalse($size, 'The file size is not available.');

        return Memory::fromBytes($size);
    }

    /**
     * @api
     */
    public function getFilename(): Filename
    {
        $filename = $this->splFileInfo->getFilename();

        return Filename::of($filename);
    }

    /**
     * @api
     */
    public function getPathname(): Path
    {
        $pathname = $this->splFileInfo->getPathname();

        return Path::of($pathname);
    }

    /**
     * @return array<string, mixed>
     *
     * @throws ThrowableInterface
     */
    public function toLog(): array
    {
        return [
            'pathname' => $this->getPathname(),
            'size' => $this->getSize()->humanReadable(),
        ];
    }
}
