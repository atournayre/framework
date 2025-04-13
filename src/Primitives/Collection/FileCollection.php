<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\Memory;
use Atournayre\Contracts\Collection\AsListInterface;
use Atournayre\Contracts\Collection\AsMapInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;
use Atournayre\Wrapper\SplFileInfo;

final class FileCollection implements LoggableInterface, AsListInterface, AsMapInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, SplFileInfo::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, SplFileInfo::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function filterByExtension(string $extension): self
    {
        $array = $this
            ->collection
            ->filter(static fn (SplFileInfo $file): bool => $file->extension()->equalsTo($extension)->isTrue())
            ->toArray()
        ;

        return FileCollection::asList($array);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function filterBySize(int $size): self
    {
        $array = $this
            ->collection
            ->filter(static fn (SplFileInfo $file): bool => $file->size()->equalsTo($size)->isTrue())
            ->toArray()
        ;

        return FileCollection::asList($array);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function filterByContent(string $content): FileCollection
    {
        $array = $this
            ->collection
            ->filter(static fn (SplFileInfo $file): bool => $file->contents()->containsAny($content)->isTrue())
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
            ->map(static fn (SplFileInfo $file) => $file->size()->asIs())
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
