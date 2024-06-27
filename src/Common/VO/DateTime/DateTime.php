<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\DateTime;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Null\NullTrait;
use Carbon\Carbon;

final class DateTime implements DateTimeInterface, LoggableInterface
{
    use NullTrait;

    private \DateTimeInterface $datetime;

    private function __construct(\DateTimeInterface $datetime)
    {
        $this->datetime = $datetime;
    }

    public static function asNull(): self
    {
        return (new self(new \DateTimeImmutable('1970-01-01')))
            ->toNullable()
        ;
    }

    /**
     * @api
     *
     * @throws \Exception
     */
    public static function of(string $datetime = 'now', ?\DateTimeZone $timezone = null): self
    {
        return new self(new \DateTime($datetime, $timezone));
    }

    /**
     * @api
     *
     * @throws \Exception
     */
    public static function fromInterface(\DateTimeInterface $datetime): self
    {
        return DateTime::of($datetime->format('Y-m-d H:i:s'), $datetime->getTimezone());
    }

    /**
     * @api
     */
    public function isAM(): bool
    {
        $noon = Carbon::parse($this->datetime)
            ->setTime(12, 0);

        return $this->toCarbon()->lt($noon);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime
     */
    public function isAfter($datetime): bool
    {
        $datetime = $this->toInterface($datetime);

        return $this->toCarbon()
            ->gt($datetime);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime
     */
    public function isAfterOrEqual($datetime): bool
    {
        $datetime = $this->toInterface($datetime);

        return $this->toCarbon()
            ->gte($datetime);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime
     */
    public function isBefore($datetime): bool
    {
        $datetime = $this->toInterface($datetime);

        return $this->toCarbon()
            ->lt($datetime);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime
     */
    public function isBeforeOrEqual($datetime): bool
    {
        $datetime = $this->toInterface($datetime);

        return $this->toCarbon()
            ->lte($datetime);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime1
     * @param \DateTimeInterface|DateTime $datetime2
     */
    public function isBetween($datetime1, $datetime2): bool
    {
        $datetime1 = $this->toInterface($datetime1);
        $datetime2 = $this->toInterface($datetime2);

        return $this->toCarbon()
            ->between($datetime1, $datetime2, false);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime1
     * @param \DateTimeInterface|DateTime $datetime2
     */
    public function isBetweenOrEqual($datetime1, $datetime2): bool
    {
        $datetime1 = $this->toInterface($datetime1);
        $datetime2 = $this->toInterface($datetime2);

        return $this->toCarbon()
            ->between($datetime1, $datetime2);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime1
     * @param \DateTimeInterface|DateTime $datetime2
     */
    public function isNotBetween($datetime1, $datetime2): bool
    {
        return !$this->isBetween($datetime1, $datetime2);
    }

    /**
     * @api
     */
    public function isPM(): bool
    {
        return !$this->isAM();
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime
     */
    public function isSame($datetime): bool
    {
        $datetime = $this->toInterface($datetime);

        return $this->toCarbon()
            ->eq($datetime);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime
     */
    public function isSameOrAfter($datetime): bool
    {
        $datetime = $this->toInterface($datetime);

        return $this->toCarbon()
            ->gte($datetime);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime
     */
    public function isSameOrBefore($datetime): bool
    {
        $datetime = $this->toInterface($datetime);

        return $this->toCarbon()
            ->lte($datetime);
    }

    /**
     * @api
     * @param \DateTimeInterface|DateTime $datetime1
     * @param \DateTimeInterface|DateTime $datetime2
     */
    public function isSameOrBetween($datetime1, $datetime2): bool
    {
        $datetime1 = $this->toInterface($datetime1);
        $datetime2 = $this->toInterface($datetime2);

        return $this->toCarbon()
            ->between($datetime1, $datetime2);
    }

    /**
     * @api
     */
    public function isWeekday(): bool
    {
        return !$this->isWeekend();
    }

    /**
     * @api
     */
    public function isWeekend(): bool
    {
        return $this->toCarbon()
            ->isWeekend();
    }

    private function toCarbon(): Carbon
    {
        return Carbon::parse($this->datetime);
    }

    /**
     * @api
     */
    public function toDateTime(): \DateTimeInterface
    {
        return $this->datetime;
    }

    private function toInterface($datetime): \DateTimeInterface
    {
        return $datetime instanceof self
            ? $datetime->toDateTime()
            : $datetime
        ;
    }

    public function toLog(): array
    {
        return [
            'datetime' => $this->datetime->format('Y-m-d H:i:s'),
        ];
    }
}
