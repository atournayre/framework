<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\Memory;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Wrapper\SplFileInfo;

/**
 * @template T
 *
 * @extends TypedCollection<SplFileInfo>
 *
 * @method FileCollection add(SplFileInfo $value, ?\Closure $callback = null)
 * @method FileCollection set($key, SplFileInfo $value, ?\Closure $callback = null)
 * @method SplFileInfo[]  values()
 * @method SplFileInfo    first()
 * @method SplFileInfo    last()
 */
final class FileCollection extends TypedCollection implements LoggableInterface
{
    protected static string $type = SplFileInfo::class;

    /**
     * @return FileCollection<T>
     *
     * @api
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, FileCollection::$type);

        return new self($collection);
    }

    /**
     * @return FileCollection<T>
     *
     * @api
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, FileCollection::$type);

        return new self($collection);
    }

    /**
     * @return FileCollection<T>
     *
     * @api
     */
    public function filterByExtension(string $extension): self
    {
        $array = $this
            ->toMap()
            ->filter(static fn (SplFileInfo $file): bool => $file->getExtension()->equalsTo($extension)->isTrue())
            ->toArray()
        ;

        return FileCollection::asList($array);
    }

    /**
     * @return FileCollection<T>
     *
     * @api
     */
    public function filterBySize(int $size): self
    {
        $array = $this
            ->toMap()
            ->filter(static fn (SplFileInfo $file): bool => $file->getSize()->equalsTo($size)->isTrue())
            ->toArray()
        ;

        return FileCollection::asList($array);
    }

    /**
     * @return FileCollection<T>
     *
     * @api
     */
    public function filterByContent(string $content): FileCollection
    {
        $array = $this
            ->toMap()
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
            ->toMap()
            ->map(static fn (SplFileInfo $file) => $file->getSize()->asIs())
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
            ->map(static fn (SplFileInfo $file): array => $file->toLog())
            ->toArray()
        ;
    }
}
