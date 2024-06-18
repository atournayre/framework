<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures;

use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Null\NullTrait;

final class Title implements NullableInterface
{
    use NullTrait;

    /**
     * @api
     */
    public string $title;

    private function __construct(string $title)
    {
        $this->title = $title;
        $this->initializeNull();
    }

    /**
     * @api
     */
    public static function create(string $title): Title
    {
        return new Title($title);
    }

    /**
     * @api
     */
    public static function asNull(): Title
    {
        $self = new self('Empty title');

        return $self->toNullable();
    }
}
