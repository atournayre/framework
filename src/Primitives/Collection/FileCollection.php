<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\VO\Memory;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\StringType;
use Symfony\Component\Finder\SplFileInfo;

final class FileCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return SplFileInfo::class;
    }

    /**
     * @api
     */
    public function filterByExtension(string $extension): self
    {
        $array = $this
            ->toMap()
            ->filter(static fn (SplFileInfo $file): bool => $file->getExtension() === $extension)
            ->toArray()
        ;

        return FileCollection::asList($array);
    }

    /**
     * @api
     */
    public function filterBySize(int $size): self
    {
        $array = $this
            ->toMap()
            ->filter(static fn (SplFileInfo $file): bool => $file->getSize() === $size)
            ->toArray()
        ;

        return FileCollection::asList($array);
    }

    /**
     * @api
     */
    public function filterByContent(string $content): FileCollection
    {
        $array = $this
            ->toMap()
            ->filter(static fn (SplFileInfo $file): bool => StringType::of($file->getContents())->containsAny($content)->isTrue())
            ->toArray()
        ;

        return FileCollection::asList($array);
    }

    /**
     * @api
     */
    public function totalSize(): Memory
    {
        $sizeInBytes = $this
            ->toMap()
            ->map(static fn (SplFileInfo $file) => $file->getSize())
            ->sum()
        ;

        return Memory::fromBytes((int) $sizeInBytes);
    }

    /**
     * @return array<array<string, mixed>>
     */
    public function toLog(): array
    {
        return $this->toMap()
            ->map(static fn (SplFileInfo $file): array => [
                'name' => $file->getFilename(),
                'size' => $file->getSize(),
            ])
            ->toArray()
        ;
    }
}
