<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface FindInterface.
 */
interface FindInterface
{
    /**
     * Returns the first/last matching element.
     *
     * @param \Closure $callback Function with (value, key) parameters and returns TRUE/FALSE
     * @param mixed    $default  Default value or exception if the map contains no elements
     * @param bool     $reverse  TRUE to test elements from back to front, FALSE for front to back (default)
     *
     * @return mixed First matching value, passed default value or an exception
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function find(\Closure $callback, $default = null, bool $reverse = false);
}
