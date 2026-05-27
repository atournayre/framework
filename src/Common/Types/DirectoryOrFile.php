<?php

declare(strict_types=1);

namespace Atournayre\Common\Types;

use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StringTypeTrait;
use Webmozart\Assert\Assert;

final class DirectoryOrFile
{
    use StringTypeTrait;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function of(string $value): self
    {
        Assert::startsWith($value, '/', 'The path must start with a slash');

        return new self(StringType::of($value));
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function suffixWith(string $suffix): self
    {
        $suffixString = StringType::of($suffix)
            ->trimEnd('/')
            ->ensureStart('/')
            ->toString()
        ;

        $newPath = $this->value
            ->trimEnd('/')
            ->ensureStart('/')
            ->append($suffixString)
        ;

        return new self($newPath);
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function prefixWith(string $prefix): self
    {
        $prefixString = StringType::of($prefix)
            ->trimEnd('/')
            ->ensureStart('/')
            ->toString()
        ;

        $newPath = $this->value
            ->trimEnd('/')
            ->ensureStart('/')
            ->prepend($prefixString)
        ;

        return new self($newPath);
    }
}
