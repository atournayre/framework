<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Exception;

interface ThrowableInterface extends \Throwable
{
    public static function new(string $message = '', int $code = 0): self;

    public static function fromThrowable(\Throwable $throwable): self;

    public function withPrevious(\Throwable $previous): self;

    /**
     * @throws ThrowableInterface
     */
    public function throw(): void;
}
