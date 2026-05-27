<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Mailer;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface SendMailInterface
{
    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function send($message, $envelope = null): void;
}
