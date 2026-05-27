<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\DateTime;
use Carbon\Carbon;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait DateTimeTrait
{
    use NullTrait;

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(
        private readonly Carbon $datetime,
    ) {
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asNull(): self
    {
        $datetime = Carbon::createFromTimestamp(0);

        return (new self($datetime))
            ->toNullable()
        ;
    }

    /**
     * @param \DateTimeInterface|DateTimeInterface|string|int|DateTime $datetime
     *
     * @throws ThrowableInterface
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function of(
        $datetime,
        ?\DateTimeZone $timezone = null,
    ): DateTimeInterface {
        if ($datetime instanceof self) {
            try {
                $fromInterface = Carbon::parse($datetime->toDateTime())
                    ->setTimezone($timezone ?? $datetime->toDateTime()->getTimezone())
                ;

                return new self($fromInterface);
            } catch (\Exception $exception) {
                throw InvalidArgumentException::fromThrowable($exception);
            }
        }

        if ($datetime instanceof \DateTimeInterface) {
            try {
                $newDateTime = Carbon::parse($datetime)
                    ->setTimezone($timezone)
                ;

                return new self($newDateTime);
            } catch (\Exception $exception) {
                throw InvalidArgumentException::fromThrowable($exception);
            }
        }

        if (is_int($datetime)) {
            try {
                $newDateTime = Carbon::createFromTimestamp($datetime)
                    ->setTimezone($timezone)
                ;

                return new self($newDateTime);
            } catch (\Exception $exception) {
                throw InvalidArgumentException::fromThrowable($exception);
            }
        }

        try {
            $datetimeObject = Carbon::parse($datetime, $timezone);

            return new self($datetimeObject);
        } catch (\Exception $exception) {
            throw InvalidArgumentException::fromThrowable($exception);
        }
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isAM(): BoolEnum
    {
        $noon = $this->datetime
            ->copy()
            ->setTime(12, 0)
        ;

        $lt = $this->datetime
            ->lt($noon)
        ;

        return BoolEnum::fromBool($lt);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isAfter(\DateTimeInterface $datetime): BoolEnum
    {
        $gt = $this->datetime
            ->gt($datetime)
        ;

        return BoolEnum::fromBool($gt);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isAfterOrEqual(\DateTimeInterface $datetime): BoolEnum
    {
        $gte = $this->datetime
            ->gte($datetime)
        ;

        return BoolEnum::fromBool($gte);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isBefore(\DateTimeInterface $datetime): BoolEnum
    {
        $lt = $this->datetime
            ->lt($datetime)
        ;

        return BoolEnum::fromBool($lt);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isBeforeOrEqual(\DateTimeInterface $datetime): BoolEnum
    {
        $lte = $this->datetime
            ->lte($datetime)
        ;

        return BoolEnum::fromBool($lte);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $between = $this->datetime
            ->between($datetime1, $datetime2, false)
        ;

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isBetweenOrEqual(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $between = $this->datetime
            ->between($datetime1, $datetime2)
        ;

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isNotBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $isNotBetween = $this
            ->isBetween($datetime1, $datetime2)
            ->isFalse()
        ;

        return BoolEnum::fromBool($isNotBetween);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isPM(): BoolEnum
    {
        $isNotAM = $this
            ->isAM()
            ->isFalse()
        ;

        return BoolEnum::fromBool($isNotAM);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSame(\DateTimeInterface $datetime): BoolEnum
    {
        $eq = $this->datetime
            ->eq($datetime)
        ;

        return BoolEnum::fromBool($eq);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameOrAfter(\DateTimeInterface $datetime): BoolEnum
    {
        $gte = $this->datetime
            ->gte($datetime)
        ;

        return BoolEnum::fromBool($gte);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameOrBefore(\DateTimeInterface $datetime): BoolEnum
    {
        $lte = $this->datetime
            ->lte($datetime)
        ;

        return BoolEnum::fromBool($lte);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameOrBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $between = $this->datetime
            ->between($datetime1, $datetime2)
        ;

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isWeekday(): BoolEnum
    {
        $isWeekday = $this->datetime
            ->isWeekday()
        ;

        return BoolEnum::fromBool($isWeekday);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isWeekend(): BoolEnum
    {
        $isWeekend = $this->datetime
            ->isWeekend()
        ;

        return BoolEnum::fromBool($isWeekend);
    }

    /**
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toDateTime(): \DateTimeInterface
    {
        return $this->datetime->toDateTime();
    }

    /**
     * @param \DateTimeZone|string|null $timezone
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setTimezone($timezone = null): DateTimeInterface
    {
        $this->datetime->setTimezone($timezone);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function year(): int
    {
        return $this->datetime
            ->year
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function yearIso(): int
    {
        return $this->datetime
            ->yearIso
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function month(): int
    {
        return $this->datetime
            ->month
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function day(): int
    {
        return $this->datetime
            ->day
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hour(): int
    {
        return $this->datetime
            ->hour
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function minute(): int
    {
        return $this->datetime
            ->minute
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function second(): int
    {
        return $this->datetime
            ->second
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function micro(): int
    {
        return $this->datetime
            ->micro
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function microsecond(): int
    {
        return $this->datetime
            ->microsecond
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function timestamp()
    {
        return $this->datetime
            ->timestamp
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function englishDayOfWeek(): string
    {
        return $this->datetime
            ->englishDayOfWeek
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shortEnglishDayOfWeek(): string
    {
        return $this->datetime
            ->shortEnglishDayOfWeek
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function englishMonth(): string
    {
        return $this->datetime
            ->englishMonth
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shortEnglishMonth(): string
    {
        return $this->datetime
            ->shortEnglishMonth
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function milliseconds(): int
    {
        return $this->datetime
            ->milliseconds
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function millisecond(): int
    {
        return $this->datetime
            ->millisecond
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function milli(): int
    {
        return $this->datetime
            ->milli
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function week(): int
    {
        return $this->datetime
            ->week
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isoWeek(): int
    {
        return $this->datetime
            ->isoWeek
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function weekYear(): int
    {
        return $this->datetime
            ->weekYear
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isoWeekYear(): int
    {
        return $this->datetime
            ->isoWeekYear
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dayOfYear(): int
    {
        return $this->datetime
            ->dayOfYear
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function age(): int
    {
        return $this->datetime
            ->age
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function offset(): int
    {
        return $this->datetime
            ->offset
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function offsetMinutes(): int
    {
        return $this->datetime
            ->offsetMinutes
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function offsetHours(): int
    {
        return $this->datetime
            ->offsetHours
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dayOfWeek(): int
    {
        return $this->datetime
            ->dayOfWeek
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dayOfWeekIso(): int
    {
        return $this->datetime
            ->dayOfWeekIso
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function weekOfYear(): int
    {
        return $this->datetime
            ->weekOfYear
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function daysInMonth(): int
    {
        return $this->datetime
            ->daysInMonth
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function latinMeridiem(): string
    {
        return $this->datetime
            ->latinMeridiem
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function latinUpperMeridiem(): string
    {
        return $this->datetime
            ->latinUpperMeridiem
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function timezoneAbbreviatedName(): string
    {
        return $this->datetime
            ->timezoneAbbreviatedName
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function tzAbbrName(): string
    {
        return $this->datetime
            ->tzAbbrName
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dayName(): string
    {
        return $this->datetime
            ->dayName
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shortDayName(): string
    {
        return $this->datetime
            ->shortDayName
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function minDayName(): string
    {
        return $this->datetime
            ->minDayName
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function monthName(): string
    {
        return $this->datetime
            ->monthName
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shortMonthName(): string
    {
        return $this->datetime
            ->shortMonthName
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function meridiem(): string
    {
        return $this->datetime
            ->meridiem
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function upperMeridiem(): string
    {
        return $this->datetime
            ->upperMeridiem
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function noZeroHour(): int
    {
        return $this->datetime
            ->noZeroHour
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function weeksInYear(): int
    {
        return $this->datetime
            ->weeksInYear
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isoWeeksInYear(): int
    {
        return $this->datetime
            ->isoWeeksInYear
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function weekOfMonth(): int
    {
        return $this->datetime
            ->weekOfMonth
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function weekNumberInMonth(): int
    {
        return $this->datetime
            ->weekNumberInMonth
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function firstWeekDay(): int
    {
        return $this->datetime
            ->firstWeekDay
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function lastWeekDay(): int
    {
        return $this->datetime
            ->lastWeekDay
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function daysInYear(): int
    {
        return $this->datetime
            ->daysInYear
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function quarter(): int
    {
        return $this->datetime
            ->quarter
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function decade(): int
    {
        return $this->datetime
            ->decade
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function century(): int
    {
        return $this->datetime
            ->century
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function millennium(): int
    {
        return $this->datetime
            ->millennium
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isDst(): BoolEnum
    {
        $isDst = $this->datetime
            ->isDST()
        ;

        return BoolEnum::fromBool($isDst);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isLocal(): BoolEnum
    {
        $isLocal = $this->datetime
            ->isLocal()
        ;

        return BoolEnum::fromBool($isLocal);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isUtc(): BoolEnum
    {
        $isUtc = $this->datetime
            ->isUtc()
        ;

        return BoolEnum::fromBool($isUtc);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function timezoneName(): string
    {
        return $this->datetime
            ->timezoneName
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function tzName(): string
    {
        return $this->datetime
            ->tzName
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function locale(): string
    {
        return $this->datetime
            ->locale
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isValid(): BoolEnum
    {
        $isValid = $this->datetime
            ->isValid()
        ;

        return BoolEnum::fromBool($isValid);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSunday(): BoolEnum
    {
        $isSunday = $this->datetime
            ->isSunday()
        ;

        return BoolEnum::fromBool($isSunday);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isMonday(): BoolEnum
    {
        $isMonday = $this->datetime
            ->isMonday()
        ;

        return BoolEnum::fromBool($isMonday);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isTuesday(): BoolEnum
    {
        $isTuesday = $this->datetime
            ->isTuesday()
        ;

        return BoolEnum::fromBool($isTuesday);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isWednesday(): BoolEnum
    {
        $isWednesday = $this->datetime
            ->isWednesday()
        ;

        return BoolEnum::fromBool($isWednesday);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isThursday(): BoolEnum
    {
        $isThursday = $this->datetime
            ->isThursday()
        ;

        return BoolEnum::fromBool($isThursday);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isFriday(): BoolEnum
    {
        $isFriday = $this->datetime
            ->isFriday()
        ;

        return BoolEnum::fromBool($isFriday);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSaturday(): BoolEnum
    {
        $isSaturday = $this->datetime
            ->isSaturday()
        ;

        return BoolEnum::fromBool($isSaturday);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameYear($date = null): BoolEnum
    {
        $isSameYear = $this->datetime
            ->isSameYear($date)
        ;

        return BoolEnum::fromBool($isSameYear);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameWeek($date = null): BoolEnum
    {
        $isSameWeek = $this->datetime
            ->isSameWeek($date)
        ;

        return BoolEnum::fromBool($isSameWeek);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameDay($date = null): BoolEnum
    {
        $isSameDay = $this->datetime
            ->isSameDay($date)
        ;

        return BoolEnum::fromBool($isSameDay);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameHour($date = null): BoolEnum
    {
        $isSameHour = $this->datetime
            ->isSameHour($date)
        ;

        return BoolEnum::fromBool($isSameHour);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameMinute($date = null): BoolEnum
    {
        $isSameMinute = $this->datetime
            ->isSameMinute($date)
        ;

        return BoolEnum::fromBool($isSameMinute);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameSecond($date = null): BoolEnum
    {
        $isSameSecond = $this->datetime
            ->isSameSecond($date)
        ;

        return BoolEnum::fromBool($isSameSecond);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameMicro($date = null): BoolEnum
    {
        $isSameMicro = $this->datetime
            ->isSameMicro($date)
        ;

        return BoolEnum::fromBool($isSameMicro);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameMicrosecond($date = null): BoolEnum
    {
        $isSameMicrosecond = $this->datetime
            ->isSameMicrosecond($date)
        ;

        return BoolEnum::fromBool($isSameMicrosecond);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameDecade($date = null): BoolEnum
    {
        $isSameDecade = $this->datetime
            ->isSameDecade($date)
        ;

        return BoolEnum::fromBool($isSameDecade);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameCentury($date = null): BoolEnum
    {
        $isSameCentury = $this->datetime
            ->isSameCentury($date)
        ;

        return BoolEnum::fromBool($isSameCentury);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isSameMillennium($date = null): BoolEnum
    {
        $isSameMillennium = $this->datetime
            ->isSameMillennium($date)
        ;

        return BoolEnum::fromBool($isSameMillennium);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function years(int $value): DateTimeInterface
    {
        $this->datetime->years($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setYears(int $value): DateTimeInterface
    {
        $this->datetime->setYears($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setYear(int $value): DateTimeInterface
    {
        $this->datetime->setYear($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function months(int $value): DateTimeInterface
    {
        $this->datetime->months($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMonths(int $value): DateTimeInterface
    {
        $this->datetime->setMonths($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMonth(int $value): DateTimeInterface
    {
        $this->datetime->setMonth($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setDays(int $value): DateTimeInterface
    {
        $this->datetime->setDays($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setDay(int $value): DateTimeInterface
    {
        $this->datetime->setDay($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hours(int $value): DateTimeInterface
    {
        $this->datetime->hours($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setHours(int $value): DateTimeInterface
    {
        $this->datetime->setHours($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setHour(int $value): DateTimeInterface
    {
        $this->datetime->setHour($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function minutes(int $value): DateTimeInterface
    {
        $this->datetime->minutes($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMinutes(int $value): DateTimeInterface
    {
        $this->datetime->setMinutes($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMinute(int $value): DateTimeInterface
    {
        $this->datetime->setMinute($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function seconds(int $value): DateTimeInterface
    {
        $this->datetime->seconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setSeconds(int $value): DateTimeInterface
    {
        $this->datetime->setSeconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setSecond(int $value): DateTimeInterface
    {
        $this->datetime->setSecond($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function millis(int $value): DateTimeInterface
    {
        $this->datetime->millis($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMillis(int $value): DateTimeInterface
    {
        $this->datetime->setMillis($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMilli(int $value): DateTimeInterface
    {
        $this->datetime->setMilli($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMilliseconds(int $value): DateTimeInterface
    {
        $this->datetime->setMilliseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMillisecond(int $value): DateTimeInterface
    {
        $this->datetime->setMillisecond($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function micros(int $value): DateTimeInterface
    {
        $this->datetime->micros($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMicros(int $value): DateTimeInterface
    {
        $this->datetime->setMicros($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMicro(int $value): DateTimeInterface
    {
        $this->datetime->setMicro($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function microseconds(int $value): DateTimeInterface
    {
        $this->datetime->microseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMicroseconds(int $value): DateTimeInterface
    {
        $this->datetime->setMicroseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setMicrosecond(int $value): DateTimeInterface
    {
        $this->datetime->setMicrosecond($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYears(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYears($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYear(): DateTimeInterface
    {
        $this->datetime->addYear();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYears(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYears($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYear(): DateTimeInterface
    {
        $this->datetime->subYear();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYearsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYearsWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYearWithOverflow(): DateTimeInterface
    {
        $this->datetime->addYearWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYearsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYearsWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYearWithOverflow(): DateTimeInterface
    {
        $this->datetime->subYearWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYearsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYearsWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYearWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addYearWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYearsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYearsWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYearWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subYearWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYearsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYearsWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYearWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addYearWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYearsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYearsWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYearWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subYearWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYearsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYearsNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addYearNoOverflow(): DateTimeInterface
    {
        $this->datetime->addYearNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYearsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYearsNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subYearNoOverflow(): DateTimeInterface
    {
        $this->datetime->subYearNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonths(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonths($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonth(): DateTimeInterface
    {
        $this->datetime->addMonth();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonths(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonths($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonth(): DateTimeInterface
    {
        $this->datetime->subMonth();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonthsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonthsWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonthWithOverflow(): DateTimeInterface
    {
        $this->datetime->addMonthWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonthsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonthsWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonthWithOverflow(): DateTimeInterface
    {
        $this->datetime->subMonthWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonthsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonthsWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonthWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addMonthWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonthsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonthsWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonthWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subMonthWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonthsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonthsWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonthWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addMonthWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonthsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonthsWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonthWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subMonthWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonthsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonthsNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMonthNoOverflow(): DateTimeInterface
    {
        $this->datetime->addMonthNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonthsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonthsNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMonthNoOverflow(): DateTimeInterface
    {
        $this->datetime->subMonthNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDays(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDays($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDay(): DateTimeInterface
    {
        $this->datetime->addDay();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDays(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDays($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDay(): DateTimeInterface
    {
        $this->datetime->subDay();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addHours(int $value = 1): DateTimeInterface
    {
        $this->datetime->addHours($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addHour(): DateTimeInterface
    {
        $this->datetime->addHour();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subHours(int $value = 1): DateTimeInterface
    {
        $this->datetime->subHours($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subHour(): DateTimeInterface
    {
        $this->datetime->subHour();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMinutes(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMinutes($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMinute(): DateTimeInterface
    {
        $this->datetime->addMinute();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMinutes(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMinutes($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMinute(): DateTimeInterface
    {
        $this->datetime->subMinute();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addSeconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addSeconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addSecond(): DateTimeInterface
    {
        $this->datetime->addSecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subSeconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subSeconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subSecond(): DateTimeInterface
    {
        $this->datetime->subSecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillis(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillis($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMilli(): DateTimeInterface
    {
        $this->datetime->addMilli();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillis(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillis($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMilli(): DateTimeInterface
    {
        $this->datetime->subMilli();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMilliseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillisecond(): DateTimeInterface
    {
        $this->datetime->addMillisecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMilliseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillisecond(): DateTimeInterface
    {
        $this->datetime->subMillisecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMicros(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMicros($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMicro(): DateTimeInterface
    {
        $this->datetime->addMicro();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMicros(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMicros($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMicro(): DateTimeInterface
    {
        $this->datetime->subMicro();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMicroseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMicrosecond(): DateTimeInterface
    {
        $this->datetime->addMicrosecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMicroseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMicrosecond(): DateTimeInterface
    {
        $this->datetime->subMicrosecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillennia(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillennia($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillennium(): DateTimeInterface
    {
        $this->datetime->addMillennium();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillennia(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillennia($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillennium(): DateTimeInterface
    {
        $this->datetime->subMillennium();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillenniaWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillenniaWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillenniumWithOverflow(): DateTimeInterface
    {
        $this->datetime->addMillenniumWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillenniaWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillenniaWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillenniumWithOverflow(): DateTimeInterface
    {
        $this->datetime->subMillenniumWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillenniaWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillenniaWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillenniumWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addMillenniumWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillenniaWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillenniaWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillenniumWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subMillenniumWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillenniaWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillenniaWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillenniumWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addMillenniumWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillenniaWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillenniaWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillenniumWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subMillenniumWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillenniaNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillenniaNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addMillenniumNoOverflow(): DateTimeInterface
    {
        $this->datetime->addMillenniumNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillenniaNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillenniaNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subMillenniumNoOverflow(): DateTimeInterface
    {
        $this->datetime->subMillenniumNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCenturies(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturies($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCentury(): DateTimeInterface
    {
        $this->datetime->addCentury();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCenturies(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturies($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCentury(): DateTimeInterface
    {
        $this->datetime->subCentury();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCenturiesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturiesWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCenturyWithOverflow(): DateTimeInterface
    {
        $this->datetime->addCenturyWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCenturiesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturiesWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCenturyWithOverflow(): DateTimeInterface
    {
        $this->datetime->subCenturyWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCenturiesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturiesWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCenturyWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addCenturyWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCenturiesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturiesWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCenturyWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subCenturyWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCenturiesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturiesWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCenturyWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addCenturyWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCenturiesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturiesWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCenturyWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subCenturyWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCenturiesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturiesNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addCenturyNoOverflow(): DateTimeInterface
    {
        $this->datetime->addCenturyNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCenturiesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturiesNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subCenturyNoOverflow(): DateTimeInterface
    {
        $this->datetime->subCenturyNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecades(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecades($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecade(): DateTimeInterface
    {
        $this->datetime->addDecade();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecades(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecades($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecade(): DateTimeInterface
    {
        $this->datetime->subDecade();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecadesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecadesWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecadeWithOverflow(): DateTimeInterface
    {
        $this->datetime->addDecadeWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecadesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecadesWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecadeWithOverflow(): DateTimeInterface
    {
        $this->datetime->subDecadeWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecadesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecadesWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecadeWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addDecadeWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecadesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecadesWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecadeWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subDecadeWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecadesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecadesWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecadeWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addDecadeWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecadesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecadesWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecadeWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subDecadeWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecadesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecadesNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addDecadeNoOverflow(): DateTimeInterface
    {
        $this->datetime->addDecadeNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecadesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecadesNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subDecadeNoOverflow(): DateTimeInterface
    {
        $this->datetime->subDecadeNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuarters(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuarters($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuarter(): DateTimeInterface
    {
        $this->datetime->addQuarter();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuarters(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuarters($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuarter(): DateTimeInterface
    {
        $this->datetime->subQuarter();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuartersWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuartersWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuarterWithOverflow(): DateTimeInterface
    {
        $this->datetime->addQuarterWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuartersWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuartersWithOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuarterWithOverflow(): DateTimeInterface
    {
        $this->datetime->subQuarterWithOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuartersWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuartersWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuarterWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addQuarterWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuartersWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuartersWithoutOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuarterWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subQuarterWithoutOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuartersWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuartersWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuarterWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addQuarterWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuartersWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuartersWithNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuarterWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subQuarterWithNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuartersNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuartersNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addQuarterNoOverflow(): DateTimeInterface
    {
        $this->datetime->addQuarterNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuartersNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuartersNoOverflow($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subQuarterNoOverflow(): DateTimeInterface
    {
        $this->datetime->subQuarterNoOverflow();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addWeeks(int $value = 1): DateTimeInterface
    {
        $this->datetime->addWeeks($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addWeek(): DateTimeInterface
    {
        $this->datetime->addWeek();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subWeeks(int $value = 1): DateTimeInterface
    {
        $this->datetime->subWeeks($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subWeek(): DateTimeInterface
    {
        $this->datetime->subWeek();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addWeekdays(int $value = 1): DateTimeInterface
    {
        $this->datetime->addWeekdays($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addWeekday(): DateTimeInterface
    {
        $this->datetime->addWeekday();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subWeekdays(int $value = 1): DateTimeInterface
    {
        $this->datetime->subWeekdays($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subWeekday(): DateTimeInterface
    {
        $this->datetime->subWeekday();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMicros(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMicros($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMicro(): DateTimeInterface
    {
        $this->datetime->addRealMicro();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMicros(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMicros($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMicro(): DateTimeInterface
    {
        $this->datetime->subRealMicro();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMicroseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMicrosecond(): DateTimeInterface
    {
        $this->datetime->addRealMicrosecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMicroseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMicrosecond(): DateTimeInterface
    {
        $this->datetime->subRealMicrosecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMillis(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMillis($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMilli(): DateTimeInterface
    {
        $this->datetime->addRealMilli();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMillis(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMillis($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMilli(): DateTimeInterface
    {
        $this->datetime->subRealMilli();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMilliseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMillisecond(): DateTimeInterface
    {
        $this->datetime->addRealMillisecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMilliseconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMillisecond(): DateTimeInterface
    {
        $this->datetime->subRealMillisecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealSeconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealSeconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealSecond(): DateTimeInterface
    {
        $this->datetime->addRealSecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealSeconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealSeconds($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealSecond(): DateTimeInterface
    {
        $this->datetime->subRealSecond();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMinutes(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMinutes($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMinute(): DateTimeInterface
    {
        $this->datetime->addRealMinute();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMinutes(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMinutes($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMinute(): DateTimeInterface
    {
        $this->datetime->subRealMinute();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealHours(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealHours($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealHour(): DateTimeInterface
    {
        $this->datetime->addRealHour();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealHours(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealHours($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealHour(): DateTimeInterface
    {
        $this->datetime->subRealHour();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealDays(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealDays($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealDay(): DateTimeInterface
    {
        $this->datetime->addRealDay();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealDays(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealDays($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealDay(): DateTimeInterface
    {
        $this->datetime->subRealDay();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealWeeks(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealWeeks($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealWeek(): DateTimeInterface
    {
        $this->datetime->addRealWeek();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealWeeks(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealWeeks($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealWeek(): DateTimeInterface
    {
        $this->datetime->subRealWeek();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMonths(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMonths($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMonth(): DateTimeInterface
    {
        $this->datetime->addRealMonth();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMonths(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMonths($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMonth(): DateTimeInterface
    {
        $this->datetime->subRealMonth();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealQuarters(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealQuarters($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealQuarter(): DateTimeInterface
    {
        $this->datetime->addRealQuarter();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealQuarters(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealQuarters($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealQuarter(): DateTimeInterface
    {
        $this->datetime->subRealQuarter();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealYears(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealYears($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealYear(): DateTimeInterface
    {
        $this->datetime->addRealYear();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealYears(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealYears($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealYear(): DateTimeInterface
    {
        $this->datetime->subRealYear();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealDecades(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealDecades($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealDecade(): DateTimeInterface
    {
        $this->datetime->addRealDecade();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealDecades(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealDecades($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealDecade(): DateTimeInterface
    {
        $this->datetime->subRealDecade();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealCenturies(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealCenturies($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealCentury(): DateTimeInterface
    {
        $this->datetime->addRealCentury();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealCenturies(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealCenturies($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealCentury(): DateTimeInterface
    {
        $this->datetime->subRealCentury();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMillennia(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMillennia($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addRealMillennium(): DateTimeInterface
    {
        $this->datetime->addRealMillennium();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMillennia(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMillennia($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subRealMillennium(): DateTimeInterface
    {
        $this->datetime->subRealMillennium();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundYear($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundYear($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundYears($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundYears($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorYear($precision = 1): DateTimeInterface
    {
        $this->datetime->floorYear($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorYears($precision = 1): DateTimeInterface
    {
        $this->datetime->floorYears($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilYear($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilYear($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilYears($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilYears($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMonth($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMonth($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMonths($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMonths($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMonth($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMonth($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMonths($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMonths($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMonth($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMonth($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMonths($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMonths($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundDay($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundDay($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundDays($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundDays($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorDay($precision = 1): DateTimeInterface
    {
        $this->datetime->floorDay($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorDays($precision = 1): DateTimeInterface
    {
        $this->datetime->floorDays($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilDay($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilDay($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilDays($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilDays($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundHour($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundHour($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundHours($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundHours($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorHour($precision = 1): DateTimeInterface
    {
        $this->datetime->floorHour($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorHours($precision = 1): DateTimeInterface
    {
        $this->datetime->floorHours($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilHour($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilHour($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilHours($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilHours($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMinute($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMinute($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMinutes($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMinutes($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMinute($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMinute($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMinutes($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMinutes($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMinute($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMinute($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMinutes($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMinutes($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundSecond($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundSecond($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundSeconds($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundSeconds($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorSecond($precision = 1): DateTimeInterface
    {
        $this->datetime->floorSecond($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorSeconds($precision = 1): DateTimeInterface
    {
        $this->datetime->floorSeconds($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilSecond($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilSecond($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilSeconds($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilSeconds($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMillennium($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMillennium($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMillennia($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMillennia($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMillennium($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMillennium($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMillennia($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMillennia($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMillennium($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMillennium($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMillennia($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMillennia($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundCentury($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundCentury($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundCenturies($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundCenturies($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorCentury($precision = 1): DateTimeInterface
    {
        $this->datetime->floorCentury($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorCenturies($precision = 1): DateTimeInterface
    {
        $this->datetime->floorCenturies($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilCentury($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilCentury($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilCenturies($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilCenturies($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundDecade($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundDecade($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundDecades($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundDecades($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorDecade($precision = 1): DateTimeInterface
    {
        $this->datetime->floorDecade($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorDecades($precision = 1): DateTimeInterface
    {
        $this->datetime->floorDecades($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilDecade($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilDecade($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilDecades($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilDecades($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundQuarter($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundQuarter($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundQuarters($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundQuarters($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorQuarter($precision = 1): DateTimeInterface
    {
        $this->datetime->floorQuarter($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorQuarters($precision = 1): DateTimeInterface
    {
        $this->datetime->floorQuarters($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilQuarter($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilQuarter($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilQuarters($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilQuarters($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMillisecond($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMillisecond($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMilliseconds($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMilliseconds($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMillisecond($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMillisecond($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMilliseconds($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMilliseconds($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMillisecond($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMillisecond($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMilliseconds($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMilliseconds($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMicrosecond($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMicrosecond($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function roundMicroseconds($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMicroseconds($precision, $function);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMicrosecond($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMicrosecond($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function floorMicroseconds($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMicroseconds($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMicrosecond($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMicrosecond($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ceilMicroseconds($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMicroseconds($precision);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shortAbsoluteDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->shortAbsoluteDiffForHumans($other, $parts)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function longAbsoluteDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->longAbsoluteDiffForHumans($other, $parts)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shortRelativeDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->shortRelativeDiffForHumans($other, $parts)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function longRelativeDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->longRelativeDiffForHumans($other, $parts)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shortRelativeToNowDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->shortRelativeToNowDiffForHumans($other, $parts)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function longRelativeToNowDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->longRelativeToNowDiffForHumans($other, $parts)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shortRelativeToOtherDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->shortRelativeToOtherDiffForHumans($other, $parts)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function longRelativeToOtherDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->longRelativeToOtherDiffForHumans($other, $parts)
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function copy(): DateTimeInterface
    {
        $copy = $this->datetime->copy();

        return self::of($copy);
    }

    /**
     * @throws ThrowableInterface
     */
    public function clone(): DateTimeInterface
    {
        $clone = $this->datetime->clone();

        return self::of($clone);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function nowWithSameTz(): DateTimeInterface
    {
        $this->datetime->nowWithSameTz();

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function get(string $name)
    {
        return $this->datetime->get($name);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function set($name, $value = null): DateTimeInterface
    {
        $this->datetime->set($name, $value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getTranslatedDayName($context = null, string $keySuffix = '', $defaultValue = null): string
    {
        return $this->datetime
            ->getTranslatedDayName($context, $keySuffix, $defaultValue)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getTranslatedShortDayName($context = null): string
    {
        return $this->datetime
            ->getTranslatedShortDayName($context)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getTranslatedMinDayName($context = null): string
    {
        return $this->datetime
            ->getTranslatedMinDayName($context)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getTranslatedMonthName($context = null, string $keySuffix = '', $defaultValue = null): string
    {
        return $this->datetime
            ->getTranslatedMonthName($context, $keySuffix, $defaultValue)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getTranslatedShortMonthName($context = null): string
    {
        return $this->datetime
            ->getTranslatedShortMonthName($context)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function weekday($value = null): int
    {
        return $this->datetime
            ->weekday($value)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isoWeekday($value = null): int
    {
        return $this->datetime
            ->isoWeekday($value)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getDaysFromStartOfWeek($weekStartsAt = null): int
    {
        return $this->datetime
            ->getDaysFromStartOfWeek($weekStartsAt)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setDaysFromStartOfWeek(int $numberOfDays, $weekStartsAt = null): DateTimeInterface
    {
        $this->datetime->setDaysFromStartOfWeek($numberOfDays, $weekStartsAt);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface
    {
        $this->datetime->setUnitNoOverflow($valueUnit, $value, $overflowUnit);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function addUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface
    {
        $this->datetime->addUnitNoOverflow($valueUnit, $value, $overflowUnit);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function subUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface
    {
        $this->datetime->subUnitNoOverflow($valueUnit, $value, $overflowUnit);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function utcOffset($minuteOffset = null): DateTimeInterface
    {
        $this->datetime->utcOffset($minuteOffset);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setDate(int $year, int $month, int $day): DateTimeInterface
    {
        $this->datetime->setDate($year, $month, $day);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setISODate(int $year, int $week, int $day = 1): DateTimeInterface
    {
        $this->datetime->setISODate($year, $week, $day);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setDateTime(int $year, int $month, int $day, int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface
    {
        $this->datetime->setDateTime($year, $month, $day, $hour, $minute, $second, $microseconds);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface
    {
        $this->datetime->setTime($hour, $minute, $second, $microseconds);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setTimestamp($unixTimestamp): DateTimeInterface
    {
        $this->datetime->setTimestamp($unixTimestamp);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setTimeFromTimeString(string $time): DateTimeInterface
    {
        $this->datetime->setTimeFromTimeString($time);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shiftTimezone($value): DateTimeInterface
    {
        $this->datetime->shiftTimezone($value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setDateFrom($date = null): DateTimeInterface
    {
        $this->datetime->setDateFrom($date);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setTimeFrom($date = null): DateTimeInterface
    {
        $this->datetime->setTimeFrom($date);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setDateTimeFrom($date = null): DateTimeInterface
    {
        $this->datetime->setDateTimeFrom($date);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getDays(): array
    {
        return $this->datetime::getDays();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getWeekStartsAt(): int
    {
        return $this->datetime::getWeekStartsAt();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getWeekEndsAt(): int
    {
        return $this->datetime::getWeekEndsAt();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getWeekendDays(): array
    {
        return $this->datetime::getWeekendDays();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hasRelativeKeywords(string $time): BoolEnum
    {
        $hasRelativeKeywords = $this->datetime::hasRelativeKeywords($time);

        return BoolEnum::fromBool($hasRelativeKeywords);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getIsoFormats($locale = null): array
    {
        return $this->datetime
            ->getIsoFormats($locale)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getCalendarFormats($locale = null): array
    {
        return $this->datetime
            ->getCalendarFormats($locale)
        ;
    }

    /**
     * @return array<string, string|array<array<string|int>>>|null
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getIsoUnits()
    {
        return $this->datetime::getIsoUnits();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getPaddedUnit(string $unit, int $length = 2, string $padString = '0', int $padType = STR_PAD_LEFT): string
    {
        return $this->datetime
            ->getPaddedUnit($unit, $length, $padString, $padType)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ordinal(string $key, $period = null): string
    {
        return $this->datetime
            ->ordinal($key, $period)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getAltNumber(string $key): string
    {
        return $this->datetime
            ->getAltNumber($key)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isoFormat(string $format, $originalFormat = null): string
    {
        return $this->datetime
            ->isoFormat($format, $originalFormat)
        ;
    }

    /**
     * @return array<string, bool|string>|null
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getFormatsToIsoReplacements()
    {
        return $this->datetime::getFormatsToIsoReplacements();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function translatedFormat(string $format): string
    {
        return $this->datetime
            ->translatedFormat($format)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function getOffsetString(string $separator = ':'): string
    {
        return $this->datetime
            ->getOffsetString($separator)
        ;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function setUnit(string $unit, $value = null): DateTimeInterface
    {
        $this->datetime->setUnit($unit, $value);

        return $this;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function singularUnit(string $unit): string
    {
        return $this->datetime::singularUnit($unit);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function pluralUnit(string $unit): string
    {
        return $this->datetime::pluralUnit($unit);
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function numberOfDaysIsLowerThanOrEquals($value, int $numberOfDays): BoolEnum
    {
        $dateTime = $this->toDateTime();
        $valueDateTime = $value instanceof DateTimeInterface ? $value->toDateTime() : DateTime::of($value)->toDateTime();

        $diff = $dateTime->diff($valueDateTime);

        $result = $diff->days <= $numberOfDays;

        return BoolEnum::fromBool($result);
    }
}
