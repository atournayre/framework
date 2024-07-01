<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\Memory;
use Atournayre\Contracts\Collection\ListInterface;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;
use Atournayre\Wrapper\SplFileInfo;

final class FileCollection implements LoggableInterface, ListInterface, MapInterface
{
    use CollectionTrait;

    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, SplFileInfo::class);

        return new self(Collection::of($collection));
    }

    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, SplFileInfo::class);

        return new self(Collection::of($collection));
    }

    /**
     * @api
     */
    public function filterByExtension(string $extension): self
    {
        $array = $this
            ->collection
            ->filter(static fn (SplFileInfo $file): bool => $file->getExtension()->equalsTo($extension)->isTrue())
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
            ->collection
            ->filter(static fn (SplFileInfo $file): bool => $file->getSize()->equalsTo($size)->isTrue())
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
            ->collection
            ->filter(static fn (SplFileInfo $file): bool => $file->getContents()->containsAny($content)->isTrue())
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
            ->collection
            ->map(static fn (SplFileInfo $file) => $file->getSize()->asIs())
            ->sum()
            ->intValue()
        ;

        return Memory::fromBytes($sizeInBytes);
    }

    /**
     * @return array<array<string, mixed>>
     */
    public function toLog(): array
    {
        return $this->collection
            ->map(static fn (SplFileInfo $file): array => $file->toLog())
            ->toArray()
        ;
    }
}
