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
    ) {
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
     *
     * @deprecated use relativePath()
     */
    public function getRelativePath(): Path // @phpstan-ignore-line
    {
        return $this->relativePath();
    }

    /**
     * @api
     *
     * @deprecated use relativePathname()
     */
    public function getRelativePathname(): Path // @phpstan-ignore-line
    {
        return $this->relativePathname();
    }

    /**
     * @api
     *
     * @deprecated use filenameWithoutExtension()
     */
    public function getFilenameWithoutExtension(): StringType // @phpstan-ignore-line
    {
        return $this->filenameWithoutExtension();
    }

    /**
     * @api
     *
     * @deprecated use contents()
     */
    public function getContents(): Content // @phpstan-ignore-line
    {
        return $this->contents();
    }

    /**
     * @api
     *
     * @deprecated use extension()
     */
    public function getExtension(): Extension // @phpstan-ignore-line
    {
        return $this->extension();
    }

    /**
     * @api
     *
     * @deprecated use size()
     */
    public function getSize(): Memory // @phpstan-ignore-line
    {
        return $this->size();
    }

    /**
     * @api
     *
     * @deprecated use filename()
     */
    public function getFilename(): Filename // @phpstan-ignore-line
    {
        return $this->filename();
    }

    /**
     * @api
     *
     * @deprecated use pathname()
     */
    public function getPathname(): Path // @phpstan-ignore-line
    {
        return $this->pathname();
    }

    /**
     * @return array<string, mixed>
     *
     * @throws ThrowableInterface
     */
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
    public function relativePath(): Path
    {
        $relativePath = $this->splFileInfo->getRelativePath();

        return Path::of($relativePath);
    }

    /**
     * @api
     */
    public function relativePathname(): Path
    {
        $relativePathname = $this->splFileInfo->getRelativePathname();

        return Path::of($relativePathname);
    }

    /**
     * @api
     */
    public function filenameWithoutExtension(): StringType
    {
        $filename = $this->splFileInfo->getFilenameWithoutExtension();

        return StringType::of($filename);
    }

    /**
     * @api
     */
    public function contents(): Content
    {
        $contents = $this->splFileInfo->getContents();

        return Content::of($contents);
    }

    /**
     * @api
     */
    public function extension(): Extension
    {
        $extension = $this->splFileInfo->getExtension();

        return Extension::of($extension);
    }

    /**
     * @api
     */
    public function size(): Memory
    {
        $size = $this->splFileInfo->getSize();

        Assert::notFalse($size, 'The file size is not available.');

        return Memory::fromBytes($size);
    }

    /**
     * @api
     */
    public function filename(): Filename
    {
        $filename = $this->splFileInfo->getFilename();

        return Filename::of($filename);
    }

    /**
     * @api
     */
    public function pathname(): Path
    {
        $pathname = $this->splFileInfo->getPathname();

        return Path::of($pathname);
    }
}
