<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
class MutableException extends \RuntimeException implements ThrowableInterface
{
    use ThrowableTrait;

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function becauseMustBeImmutable(): self
    {
        return self::new('Must be immutable.');
    }
}
