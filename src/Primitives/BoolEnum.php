<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Contracts\Log\LoggerInterface;

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
     * @param string|\Exception $message
     *
     * @throws \Exception|\InvalidArgumentException
     */
    public function throwIfFalse($message): void
    {
        if ($this->isTrue()) {
            return;
        }

        if (is_string($message)) {
            $this->logger?->error($message);
            throw new \InvalidArgumentException($message);
        }

        throw $message;
    }

    /**
     * @api
     *
     * @param string|\Exception $message
     *
     * @throws \Exception
     */
    public function throwIfTrue($message): void
    {
        if ($this->isFalse()) {
            return;
        }

        if (is_string($message)) {
            $this->logger?->error($message);
            throw new \InvalidArgumentException($message);
        }

        throw $message;
    }
}
