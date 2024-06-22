<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Mailer;

interface SendMailInterface
{
    /**
     * @api
     *
     * @throws \Throwable
     */
    // @phpstan-ignore-next-line
    public function send($message, $envelope = null): void;
}
