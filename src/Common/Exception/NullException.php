<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

class NullException extends \Exception implements ThrowableInterface
{
    use ThrowableTrait;

    /**
     * @api
     */
    public static function null(): self
    {
        return self::new('Empty exception.');
    }
}
