<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
class UnexpectedValueException extends \UnexpectedValueException implements ThrowableInterface
{
    use ThrowableTrait;
}
