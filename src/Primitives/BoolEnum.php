<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggerInterface;

use function Symfony\Component\String\u;

final class BoolEnum
{
    private const TRUE = 'true';

    private const FALSE = 'false';

    private ?LoggerInterface $logger = null;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private function __construct(
        private readonly string $value,
    ) {
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function fromBool(bool $value): self
    {
        return $value ? self::true() : self::false();
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withLogger(LoggerInterface $logger): self
    {
        $clone = clone $this;
        $clone->logger = $logger;

        return $clone;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function asString(): string
    {
        return u($this->value)->lower()->toString();
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function asInt(): int
    {
        return self::TRUE === $this->value ? 1 : 0;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function asBool(): bool
    {
        return self::TRUE === $this->value;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isTrue(): bool
    {
        return self::TRUE === $this->value;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isFalse(): bool
    {
        return self::FALSE === $this->value;
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function yes(): bool
    {
        return $this->isTrue();
    }

    /**
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function no(): bool
    {
        return $this->isFalse();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private static function true(): self
    {
        return new self(self::TRUE);
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private static function false(): self
    {
        return new self(self::FALSE);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function throwIfTrue(string|\Exception $message): void
    {
        if ($this->isFalse()) {
            return;
        }

        $this->throw($message);
    }
}
