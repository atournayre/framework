<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures;

final class Person
{
    /**
     * @api
     */
    public string $name;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }
}
