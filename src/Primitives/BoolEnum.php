<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Exception\InvalidArgumentException;

use function Symfony\Component\String\u;

final class BoolEnum
{
    private const TRUE = 'true';

    private const FALSE = 'false';

    private string $value;

    private ?LoggerInterface $logger = null;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromBool(bool $value): self
    {
        return $value ? self::true() : self::false();
    }

    /**
     * @api
     */
    public function withLogger(LoggerInterface $logger): self
    {
        $clone = clone $this;
        $clone->logger = $logger;

        return $clone;
    }

    /**
     * @api
     */
    public function asString(): string
    {
        return u($this->value)->lower()->toString();
    }

    /**
     * @api
     */
    public function asInt(): int
    {
        return self::TRUE === $this->value ? 1 : 0;
    }

    /**
     * @api
     */
    public function asBool(): bool
    {
        return self::TRUE === $this->value;
    }

    /**
     * @api
     */
    public function isTrue(): bool
    {
        return self::TRUE === $this->value;
    }

    /**
     * @api
     */
    public function isFalse(): bool
    {
        return self::FALSE === $this->value;
    }

    /**
     * @api
     */
    public function yes(): bool
    {
        return $this->isTrue();
    }

    /**
     * @api
     */
    public function no(): bool
    {
        return $this->isFalse();
    }

    private static function true(): self
    {
        return new self(self::TRUE);
    }

    private static function false(): self
    {
        return new self(self::FALSE);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function throwIfFalse(string|\Exception $message): void
    {
        if ($this->isTrue()) {
            return;
        }

        $this->throw($message);
    }

    /**
     * @throws ThrowableInterface
     */
    private function throw(string|\Exception $message): void
    {
        $invalidArgumentException = is_string($message)
            ? InvalidArgumentException::new($message)
            : InvalidArgumentException::new($message->getMessage())->withPrevious($message);

        $this->logger?->exception($invalidArgumentException);

        $invalidArgumentException->throw();
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function throwIfTrue(string|\Exception $message): void
    {
        if ($this->isFalse()) {
            return;
        }

        $this->throw($message);
    }
}
