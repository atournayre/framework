<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface InsertAfterInterface.
 */
interface InsertAfterInterface
{
    /**
     * Inserts the value after the given element.
     *
     * @param mixed|null $element Element to insert after
     * @param mixed|null $value   Value to insert
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertAfter($element, $value): self;
}
