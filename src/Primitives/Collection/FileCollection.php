<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\VO\Memory;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Wrapper\SplFileInfo;

/**
 * @method SplFileInfo    first()
 * @method SplFileInfo    last()
 * @method FileCollection values()
 */
final class FileCollection implements LoggableInterface
{
    use CollectionTrait;
    use MapTrait;
    use ListTrait;

    protected static string $type = SplFileInfo::class;

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
        ;

        return Memory::fromBytes((int) $sizeInBytes);
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
