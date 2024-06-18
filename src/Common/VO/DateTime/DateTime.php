<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\DateTime;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Null\NullTrait;
use Carbon\Carbon;

final class DateTime implements DateTimeInterface
{
    use NullTrait;

    private \DateTimeInterface $datetime;

    private function __construct(\DateTimeInterface $datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @api
     *
     * @throws \Exception
     */
    public static function fromInterface(\DateTimeInterface $datetime): self
    {
        return new self($datetime);
    }

    /**
     * @api
     */
    public function isAM(): bool
    {
        $noon = Carbon::parse($this->datetime)->setTime(12, 0);

        return $this->toCarbon()->lt($noon);
    }

    /**
     * @api
     */
    public function isAfter(\DateTimeInterface $datetime): bool
    {
        return $this->toCarbon()->gt($datetime);
    }

    /**
     * @api
     */
    public function isAfterOrEqual(\DateTimeInterface $datetime): bool
    {
        return $this->toCarbon()->gte($datetime);
    }

    /**
     * @api
     */
    public function isBefore(\DateTimeInterface $datetime): bool
    {
        return $this->toCarbon()->lt($datetime);
    }

    /**
     * @api
     */
    public function isBeforeOrEqual(\DateTimeInterface $datetime): bool
    {
        return $this->toCarbon()->lte($datetime);
    }

    /**
     * @api
     */
    public function isBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): bool
    {
        return $this->toCarbon()->between($datetime1, $datetime2, false);
    }

    /**
     * @api
     */
    public function isBetweenOrEqual(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): bool
    {
        return $this->toCarbon()->between($datetime1, $datetime2);
    }

    /**
     * @api
     */
    public function isNotBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): bool
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
     */
    public function isSame(\DateTimeInterface $datetime): bool
    {
        return $this->toCarbon()->eq($datetime);
    }

    /**
     * @api
     */
    public function isSameOrAfter(\DateTimeInterface $datetime): bool
    {
        return $this->toCarbon()->gte($datetime);
    }

    /**
     * @api
     */
    public function isSameOrBefore(\DateTimeInterface $datetime): bool
    {
        return $this->toCarbon()->lte($datetime);
    }

    /**
     * @api
     */
    public function isSameOrBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): bool
    {
        return $this->toCarbon()->between($datetime1, $datetime2);
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
        return $this->toCarbon()->isWeekend();
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
}
