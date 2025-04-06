<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Mailer;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface SendMailInterface
{
    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    // @phpstan-ignore-next-line
    public function send($message, $envelope = null): void;
}
