<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Null\NullTrait;
use Carbon\Carbon;

final class DateTime implements DateTimeInterface
{
    use NullTrait;

    private Carbon $datetime;

    private function __construct(Carbon $datetime)
    {
        $this->datetime = $datetime;
    }

    public static function asNull(): self
    {
        $datetime = Carbon::createFromTimestamp(0);

        return (new self($datetime))
            ->toNullable()
        ;
    }

    /**
     * @api
     *
     * @param \DateTimeInterface|DateTimeInterface|string|int|DateTime $datetime
     *
     * @throws \Exception
     */
    public static function of(
        $datetime,
        ?\DateTimeZone $timezone = null
    ): DateTimeInterface {
        if ($datetime instanceof self) {
            $fromInterface = Carbon::parse($datetime->toDateTime())
                ->setTimezone($timezone ?? $datetime->toDateTime()->getTimezone())
            ;

            return new self($fromInterface);
        }

        if ($datetime instanceof \DateTimeInterface) {
            $newDateTime = Carbon::parse($datetime)
                ->setTimezone($timezone)
            ;

            return new self($newDateTime);
        }

        if (is_int($datetime)) {
            $newDateTime = Carbon::createFromTimestamp($datetime)
                ->setTimezone($timezone)
            ;

            return new self($newDateTime);
        }

        $datetimeObject = Carbon::parse($datetime, $timezone);

        return new self($datetimeObject);
    }

    /**
     * @api
     */
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
     */
    public function isAfter(\DateTimeInterface $datetime): BoolEnum
    {
        $gt = $this->datetime
            ->gt($datetime)
        ;

        return BoolEnum::fromBool($gt);
    }

    /**
     * @api
     */
    public function isAfterOrEqual(\DateTimeInterface $datetime): BoolEnum
    {
        $gte = $this->datetime
            ->gte($datetime)
        ;

        return BoolEnum::fromBool($gte);
    }

    /**
     * @api
     */
    public function isBefore(\DateTimeInterface $datetime): BoolEnum
    {
        $lt = $this->datetime
            ->lt($datetime)
        ;

        return BoolEnum::fromBool($lt);
    }

    /**
     * @api
     */
    public function isBeforeOrEqual(\DateTimeInterface $datetime): BoolEnum
    {
        $lte = $this->datetime
            ->lte($datetime)
        ;

        return BoolEnum::fromBool($lte);
    }

    /**
     * @api
     */
    public function isBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $between = $this->datetime
            ->between($datetime1, $datetime2, false)
        ;

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     */
    public function isBetweenOrEqual(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $between = $this->datetime
            ->between($datetime1, $datetime2)
        ;

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     */
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
     */
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
     */
    public function isSame(\DateTimeInterface $datetime): BoolEnum
    {
        $eq = $this->datetime
            ->eq($datetime)
        ;

        return BoolEnum::fromBool($eq);
    }

    /**
     * @api
     */
    public function isSameOrAfter(\DateTimeInterface $datetime): BoolEnum
    {
        $gte = $this->datetime
            ->gte($datetime)
        ;

        return BoolEnum::fromBool($gte);
    }

    /**
     * @api
     */
    public function isSameOrBefore(\DateTimeInterface $datetime): BoolEnum
    {
        $lte = $this->datetime
            ->lte($datetime)
        ;

        return BoolEnum::fromBool($lte);
    }

    /**
     * @api
     */
    public function isSameOrBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $between = $this->datetime
            ->between($datetime1, $datetime2)
        ;

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     */
    public function isWeekday(): BoolEnum
    {
        $isWeekday = $this->datetime
            ->isWeekday()
        ;

        return BoolEnum::fromBool($isWeekday);
    }

    /**
     * @api
     */
    public function isWeekend(): BoolEnum
    {
        $isWeekend = $this->datetime
            ->isWeekend()
        ;

        return BoolEnum::fromBool($isWeekend);
    }

    /**
     * @api
     */
    public function toDateTime(): \DateTimeInterface
    {
        return $this->datetime->toDateTime();
    }

    /**
     * @param \DateTimeZone|string|null $timezone
     */
    public function setTimezone($timezone = null): DateTimeInterface
    {
        $this->datetime->setTimezone($timezone);

        return $this;
    }

    public function year(): int
    {
        return $this->datetime
            ->year
        ;
    }

    public function yearIso(): int
    {
        return $this->datetime
            ->yearIso
        ;
    }

    public function month(): int
    {
        return $this->datetime
            ->month
        ;
    }

    public function day(): int
    {
        return $this->datetime
            ->day
        ;
    }

    public function hour(): int
    {
        return $this->datetime
            ->hour
        ;
    }

    public function minute(): int
    {
        return $this->datetime
            ->minute
        ;
    }

    public function second(): int
    {
        return $this->datetime
            ->second
        ;
    }

    public function micro(): int
    {
        return $this->datetime
            ->micro
        ;
    }

    public function microsecond(): int
    {
        return $this->datetime
            ->microsecond
        ;
    }

    public function timestamp()
    {
        return $this->datetime
            ->timestamp
        ;
    }

    public function englishDayOfWeek(): string
    {
        return $this->datetime
            ->englishDayOfWeek
        ;
    }

    public function shortEnglishDayOfWeek(): string
    {
        return $this->datetime
            ->shortEnglishDayOfWeek
        ;
    }

    public function englishMonth(): string
    {
        return $this->datetime
            ->englishMonth
        ;
    }

    public function shortEnglishMonth(): string
    {
        return $this->datetime
            ->shortEnglishMonth
        ;
    }

    public function milliseconds(): int
    {
        return $this->datetime
            ->milliseconds
        ;
    }

    public function millisecond(): int
    {
        return $this->datetime
            ->millisecond
        ;
    }

    public function milli(): int
    {
        return $this->datetime
            ->milli
        ;
    }

    public function week(): int
    {
        return $this->datetime
            ->week
        ;
    }

    public function isoWeek(): int
    {
        return $this->datetime
            ->isoWeek
        ;
    }

    public function weekYear(): int
    {
        return $this->datetime
            ->weekYear
        ;
    }

    public function isoWeekYear(): int
    {
        return $this->datetime
            ->isoWeekYear
        ;
    }

    public function dayOfYear(): int
    {
        return $this->datetime
            ->dayOfYear
        ;
    }

    public function age(): int
    {
        return $this->datetime
            ->age
        ;
    }

    public function offset(): int
    {
        return $this->datetime
            ->offset
        ;
    }

    public function offsetMinutes(): int
    {
        return $this->datetime
            ->offsetMinutes
        ;
    }

    public function offsetHours(): int
    {
        return $this->datetime
            ->offsetHours
        ;
    }

    public function dayOfWeek(): int
    {
        return $this->datetime
            ->dayOfWeek
        ;
    }

    public function dayOfWeekIso(): int
    {
        return $this->datetime
            ->dayOfWeekIso
        ;
    }

    public function weekOfYear(): int
    {
        return $this->datetime
            ->weekOfYear
        ;
    }

    public function daysInMonth(): int
    {
        return $this->datetime
            ->daysInMonth
        ;
    }

    public function latinMeridiem(): string
    {
        return $this->datetime
            ->latinMeridiem
        ;
    }

    public function latinUpperMeridiem(): string
    {
        return $this->datetime
            ->latinUpperMeridiem
        ;
    }

    public function timezoneAbbreviatedName(): string
    {
        return $this->datetime
            ->timezoneAbbreviatedName
        ;
    }

    public function tzAbbrName(): string
    {
        return $this->datetime
            ->tzAbbrName
        ;
    }

    public function dayName(): string
    {
        return $this->datetime
            ->dayName
        ;
    }

    public function shortDayName(): string
    {
        return $this->datetime
            ->shortDayName
        ;
    }

    public function minDayName(): string
    {
        return $this->datetime
            ->minDayName
        ;
    }

    public function monthName(): string
    {
        return $this->datetime
            ->monthName
        ;
    }

    public function shortMonthName(): string
    {
        return $this->datetime
            ->shortMonthName
        ;
    }

    public function meridiem(): string
    {
        return $this->datetime
            ->meridiem
        ;
    }

    public function upperMeridiem(): string
    {
        return $this->datetime
            ->upperMeridiem
        ;
    }

    public function noZeroHour(): int
    {
        return $this->datetime
            ->noZeroHour
        ;
    }

    public function weeksInYear(): int
    {
        return $this->datetime
            ->weeksInYear
        ;
    }

    public function isoWeeksInYear(): int
    {
        return $this->datetime
            ->isoWeeksInYear
        ;
    }

    public function weekOfMonth(): int
    {
        return $this->datetime
            ->weekOfMonth
        ;
    }

    public function weekNumberInMonth(): int
    {
        return $this->datetime
            ->weekNumberInMonth
        ;
    }

    public function firstWeekDay(): int
    {
        return $this->datetime
            ->firstWeekDay
        ;
    }

    public function lastWeekDay(): int
    {
        return $this->datetime
            ->lastWeekDay
        ;
    }

    public function daysInYear(): int
    {
        return $this->datetime
            ->daysInYear
        ;
    }

    public function quarter(): int
    {
        return $this->datetime
            ->quarter
        ;
    }

    public function decade(): int
    {
        return $this->datetime
            ->decade
        ;
    }

    public function century(): int
    {
        return $this->datetime
            ->century
        ;
    }

    public function millennium(): int
    {
        return $this->datetime
            ->millennium
        ;
    }

    public function isDst(): BoolEnum
    {
        $isDst = $this->datetime
            ->isDST()
        ;

        return BoolEnum::fromBool($isDst);
    }

    public function isLocal(): BoolEnum
    {
        $isLocal = $this->datetime
            ->isLocal()
        ;

        return BoolEnum::fromBool($isLocal);
    }

    public function isUtc(): BoolEnum
    {
        $isUtc = $this->datetime
            ->isUtc()
        ;

        return BoolEnum::fromBool($isUtc);
    }

    public function timezoneName(): string
    {
        return $this->datetime
            ->timezoneName
        ;
    }

    public function tzName(): string
    {
        return $this->datetime
            ->tzName
        ;
    }

    public function locale(): string
    {
        return $this->datetime
            ->locale
        ;
    }

    public function isValid(): BoolEnum
    {
        $isValid = $this->datetime
            ->isValid()
        ;

        return BoolEnum::fromBool($isValid);
    }

    public function isSunday(): BoolEnum
    {
        $isSunday = $this->datetime
            ->isSunday()
        ;

        return BoolEnum::fromBool($isSunday);
    }

    public function isMonday(): BoolEnum
    {
        $isMonday = $this->datetime
            ->isMonday()
        ;

        return BoolEnum::fromBool($isMonday);
    }

    public function isTuesday(): BoolEnum
    {
        $isTuesday = $this->datetime
            ->isTuesday()
        ;

        return BoolEnum::fromBool($isTuesday);
    }

    public function isWednesday(): BoolEnum
    {
        $isWednesday = $this->datetime
            ->isWednesday()
        ;

        return BoolEnum::fromBool($isWednesday);
    }

    public function isThursday(): BoolEnum
    {
        $isThursday = $this->datetime
            ->isThursday()
        ;

        return BoolEnum::fromBool($isThursday);
    }

    public function isFriday(): BoolEnum
    {
        $isFriday = $this->datetime
            ->isFriday()
        ;

        return BoolEnum::fromBool($isFriday);
    }

    public function isSaturday(): BoolEnum
    {
        $isSaturday = $this->datetime
            ->isSaturday()
        ;

        return BoolEnum::fromBool($isSaturday);
    }

    public function isSameYear($date = null): BoolEnum
    {
        $isSameYear = $this->datetime
            ->isSameYear($date)
        ;

        return BoolEnum::fromBool($isSameYear);
    }

    public function isSameWeek($date = null): BoolEnum
    {
        $isSameWeek = $this->datetime
            ->isSameWeek($date)
        ;

        return BoolEnum::fromBool($isSameWeek);
    }

    public function isSameDay($date = null): BoolEnum
    {
        $isSameDay = $this->datetime
            ->isSameDay($date)
        ;

        return BoolEnum::fromBool($isSameDay);
    }

    public function isSameHour($date = null): BoolEnum
    {
        $isSameHour = $this->datetime
            ->isSameHour($date)
        ;

        return BoolEnum::fromBool($isSameHour);
    }

    public function isSameMinute($date = null): BoolEnum
    {
        $isSameMinute = $this->datetime
            ->isSameMinute($date)
        ;

        return BoolEnum::fromBool($isSameMinute);
    }

    public function isSameSecond($date = null): BoolEnum
    {
        $isSameSecond = $this->datetime
            ->isSameSecond($date)
        ;

        return BoolEnum::fromBool($isSameSecond);
    }

    public function isSameMicro($date = null): BoolEnum
    {
        $isSameMicro = $this->datetime
            ->isSameMicro($date)
        ;

        return BoolEnum::fromBool($isSameMicro);
    }

    public function isSameMicrosecond($date = null): BoolEnum
    {
        $isSameMicrosecond = $this->datetime
            ->isSameMicrosecond($date)
        ;

        return BoolEnum::fromBool($isSameMicrosecond);
    }

    public function isSameDecade($date = null): BoolEnum
    {
        $isSameDecade = $this->datetime
            ->isSameDecade($date)
        ;

        return BoolEnum::fromBool($isSameDecade);
    }

    public function isSameCentury($date = null): BoolEnum
    {
        $isSameCentury = $this->datetime
            ->isSameCentury($date)
        ;

        return BoolEnum::fromBool($isSameCentury);
    }

    public function isSameMillennium($date = null): BoolEnum
    {
        $isSameMillennium = $this->datetime
            ->isSameMillennium($date)
        ;

        return BoolEnum::fromBool($isSameMillennium);
    }

    public function years(int $value): DateTimeInterface
    {
        $this->datetime->years($value);

        return $this;
    }

    public function setYears(int $value): DateTimeInterface
    {
        $this->datetime->setYears($value);

        return $this;
    }

    public function setYear(int $value): DateTimeInterface
    {
        $this->datetime->setYear($value);

        return $this;
    }

    public function months(int $value): DateTimeInterface
    {
        $this->datetime->months($value);

        return $this;
    }

    public function setMonths(int $value): DateTimeInterface
    {
        $this->datetime->setMonths($value);

        return $this;
    }

    public function setMonth(int $value): DateTimeInterface
    {
        $this->datetime->setMonth($value);

        return $this;
    }

    public function setDays(int $value): DateTimeInterface
    {
        $this->datetime->setDays($value);

        return $this;
    }

    public function setDay(int $value): DateTimeInterface
    {
        $this->datetime->setDay($value);

        return $this;
    }

    public function hours(int $value): DateTimeInterface
    {
        $this->datetime->hours($value);

        return $this;
    }

    public function setHours(int $value): DateTimeInterface
    {
        $this->datetime->setHours($value);

        return $this;
    }

    public function setHour(int $value): DateTimeInterface
    {
        $this->datetime->setHour($value);

        return $this;
    }

    public function minutes(int $value): DateTimeInterface
    {
        $this->datetime->minutes($value);

        return $this;
    }

    public function setMinutes(int $value): DateTimeInterface
    {
        $this->datetime->setMinutes($value);

        return $this;
    }

    public function setMinute(int $value): DateTimeInterface
    {
        $this->datetime->setMinute($value);

        return $this;
    }

    public function seconds(int $value): DateTimeInterface
    {
        $this->datetime->seconds($value);

        return $this;
    }

    public function setSeconds(int $value): DateTimeInterface
    {
        $this->datetime->setSeconds($value);

        return $this;
    }

    public function setSecond(int $value): DateTimeInterface
    {
        $this->datetime->setSecond($value);

        return $this;
    }

    public function millis(int $value): DateTimeInterface
    {
        $this->datetime->millis($value);

        return $this;
    }

    public function setMillis(int $value): DateTimeInterface
    {
        $this->datetime->setMillis($value);

        return $this;
    }

    public function setMilli(int $value): DateTimeInterface
    {
        $this->datetime->setMilli($value);

        return $this;
    }

    public function setMilliseconds(int $value): DateTimeInterface
    {
        $this->datetime->setMilliseconds($value);

        return $this;
    }

    public function setMillisecond(int $value): DateTimeInterface
    {
        $this->datetime->setMillisecond($value);

        return $this;
    }

    public function micros(int $value): DateTimeInterface
    {
        $this->datetime->micros($value);

        return $this;
    }

    public function setMicros(int $value): DateTimeInterface
    {
        $this->datetime->setMicros($value);

        return $this;
    }

    public function setMicro(int $value): DateTimeInterface
    {
        $this->datetime->setMicro($value);

        return $this;
    }

    public function microseconds(int $value): DateTimeInterface
    {
        $this->datetime->microseconds($value);

        return $this;
    }

    public function setMicroseconds(int $value): DateTimeInterface
    {
        $this->datetime->setMicroseconds($value);

        return $this;
    }

    public function setMicrosecond(int $value): DateTimeInterface
    {
        $this->datetime->setMicrosecond($value);

        return $this;
    }

    public function addYears(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYears($value);

        return $this;
    }

    public function addYear(): DateTimeInterface
    {
        $this->datetime->addYear();

        return $this;
    }

    public function subYears(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYears($value);

        return $this;
    }

    public function subYear(): DateTimeInterface
    {
        $this->datetime->subYear();

        return $this;
    }

    public function addYearsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYearsWithOverflow($value);

        return $this;
    }

    public function addYearWithOverflow(): DateTimeInterface
    {
        $this->datetime->addYearWithOverflow();

        return $this;
    }

    public function subYearsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYearsWithOverflow($value);

        return $this;
    }

    public function subYearWithOverflow(): DateTimeInterface
    {
        $this->datetime->subYearWithOverflow();

        return $this;
    }

    public function addYearsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYearsWithoutOverflow($value);

        return $this;
    }

    public function addYearWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addYearWithoutOverflow();

        return $this;
    }

    public function subYearsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYearsWithoutOverflow($value);

        return $this;
    }

    public function subYearWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subYearWithoutOverflow();

        return $this;
    }

    public function addYearsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYearsWithNoOverflow($value);

        return $this;
    }

    public function addYearWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addYearWithNoOverflow();

        return $this;
    }

    public function subYearsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYearsWithNoOverflow($value);

        return $this;
    }

    public function subYearWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subYearWithNoOverflow();

        return $this;
    }

    public function addYearsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addYearsNoOverflow($value);

        return $this;
    }

    public function addYearNoOverflow(): DateTimeInterface
    {
        $this->datetime->addYearNoOverflow();

        return $this;
    }

    public function subYearsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subYearsNoOverflow($value);

        return $this;
    }

    public function subYearNoOverflow(): DateTimeInterface
    {
        $this->datetime->subYearNoOverflow();

        return $this;
    }

    public function addMonths(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonths($value);

        return $this;
    }

    public function addMonth(): DateTimeInterface
    {
        $this->datetime->addMonth();

        return $this;
    }

    public function subMonths(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonths($value);

        return $this;
    }

    public function subMonth(): DateTimeInterface
    {
        $this->datetime->subMonth();

        return $this;
    }

    public function addMonthsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonthsWithOverflow($value);

        return $this;
    }

    public function addMonthWithOverflow(): DateTimeInterface
    {
        $this->datetime->addMonthWithOverflow();

        return $this;
    }

    public function subMonthsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonthsWithOverflow($value);

        return $this;
    }

    public function subMonthWithOverflow(): DateTimeInterface
    {
        $this->datetime->subMonthWithOverflow();

        return $this;
    }

    public function addMonthsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonthsWithoutOverflow($value);

        return $this;
    }

    public function addMonthWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addMonthWithoutOverflow();

        return $this;
    }

    public function subMonthsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonthsWithoutOverflow($value);

        return $this;
    }

    public function subMonthWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subMonthWithoutOverflow();

        return $this;
    }

    public function addMonthsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonthsWithNoOverflow($value);

        return $this;
    }

    public function addMonthWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addMonthWithNoOverflow();

        return $this;
    }

    public function subMonthsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonthsWithNoOverflow($value);

        return $this;
    }

    public function subMonthWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subMonthWithNoOverflow();

        return $this;
    }

    public function addMonthsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMonthsNoOverflow($value);

        return $this;
    }

    public function addMonthNoOverflow(): DateTimeInterface
    {
        $this->datetime->addMonthNoOverflow();

        return $this;
    }

    public function subMonthsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMonthsNoOverflow($value);

        return $this;
    }

    public function subMonthNoOverflow(): DateTimeInterface
    {
        $this->datetime->subMonthNoOverflow();

        return $this;
    }

    public function addDays(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDays($value);

        return $this;
    }

    public function addDay(): DateTimeInterface
    {
        $this->datetime->addDay();

        return $this;
    }

    public function subDays(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDays($value);

        return $this;
    }

    public function subDay(): DateTimeInterface
    {
        $this->datetime->subDay();

        return $this;
    }

    public function addHours(int $value = 1): DateTimeInterface
    {
        $this->datetime->addHours($value);

        return $this;
    }

    public function addHour(): DateTimeInterface
    {
        $this->datetime->addHour();

        return $this;
    }

    public function subHours(int $value = 1): DateTimeInterface
    {
        $this->datetime->subHours($value);

        return $this;
    }

    public function subHour(): DateTimeInterface
    {
        $this->datetime->subHour();

        return $this;
    }

    public function addMinutes(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMinutes($value);

        return $this;
    }

    public function addMinute(): DateTimeInterface
    {
        $this->datetime->addMinute();

        return $this;
    }

    public function subMinutes(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMinutes($value);

        return $this;
    }

    public function subMinute(): DateTimeInterface
    {
        $this->datetime->subMinute();

        return $this;
    }

    public function addSeconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addSeconds($value);

        return $this;
    }

    public function addSecond(): DateTimeInterface
    {
        $this->datetime->addSecond();

        return $this;
    }

    public function subSeconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subSeconds($value);

        return $this;
    }

    public function subSecond(): DateTimeInterface
    {
        $this->datetime->subSecond();

        return $this;
    }

    public function addMillis(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillis($value);

        return $this;
    }

    public function addMilli(): DateTimeInterface
    {
        $this->datetime->addMilli();

        return $this;
    }

    public function subMillis(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillis($value);

        return $this;
    }

    public function subMilli(): DateTimeInterface
    {
        $this->datetime->subMilli();

        return $this;
    }

    public function addMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMilliseconds($value);

        return $this;
    }

    public function addMillisecond(): DateTimeInterface
    {
        $this->datetime->addMillisecond();

        return $this;
    }

    public function subMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMilliseconds($value);

        return $this;
    }

    public function subMillisecond(): DateTimeInterface
    {
        $this->datetime->subMillisecond();

        return $this;
    }

    public function addMicros(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMicros($value);

        return $this;
    }

    public function addMicro(): DateTimeInterface
    {
        $this->datetime->addMicro();

        return $this;
    }

    public function subMicros(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMicros($value);

        return $this;
    }

    public function subMicro(): DateTimeInterface
    {
        $this->datetime->subMicro();

        return $this;
    }

    public function addMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMicroseconds($value);

        return $this;
    }

    public function addMicrosecond(): DateTimeInterface
    {
        $this->datetime->addMicrosecond();

        return $this;
    }

    public function subMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMicroseconds($value);

        return $this;
    }

    public function subMicrosecond(): DateTimeInterface
    {
        $this->datetime->subMicrosecond();

        return $this;
    }

    public function addMillennia(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillennia($value);

        return $this;
    }

    public function addMillennium(): DateTimeInterface
    {
        $this->datetime->addMillennium();

        return $this;
    }

    public function subMillennia(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillennia($value);

        return $this;
    }

    public function subMillennium(): DateTimeInterface
    {
        $this->datetime->subMillennium();

        return $this;
    }

    public function addMillenniaWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillenniaWithOverflow($value);

        return $this;
    }

    public function addMillenniumWithOverflow(): DateTimeInterface
    {
        $this->datetime->addMillenniumWithOverflow();

        return $this;
    }

    public function subMillenniaWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillenniaWithOverflow($value);

        return $this;
    }

    public function subMillenniumWithOverflow(): DateTimeInterface
    {
        $this->datetime->subMillenniumWithOverflow();

        return $this;
    }

    public function addMillenniaWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillenniaWithoutOverflow($value);

        return $this;
    }

    public function addMillenniumWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addMillenniumWithoutOverflow();

        return $this;
    }

    public function subMillenniaWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillenniaWithoutOverflow($value);

        return $this;
    }

    public function subMillenniumWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subMillenniumWithoutOverflow();

        return $this;
    }

    public function addMillenniaWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillenniaWithNoOverflow($value);

        return $this;
    }

    public function addMillenniumWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addMillenniumWithNoOverflow();

        return $this;
    }

    public function subMillenniaWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillenniaWithNoOverflow($value);

        return $this;
    }

    public function subMillenniumWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subMillenniumWithNoOverflow();

        return $this;
    }

    public function addMillenniaNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addMillenniaNoOverflow($value);

        return $this;
    }

    public function addMillenniumNoOverflow(): DateTimeInterface
    {
        $this->datetime->addMillenniumNoOverflow();

        return $this;
    }

    public function subMillenniaNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subMillenniaNoOverflow($value);

        return $this;
    }

    public function subMillenniumNoOverflow(): DateTimeInterface
    {
        $this->datetime->subMillenniumNoOverflow();

        return $this;
    }

    public function addCenturies(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturies($value);

        return $this;
    }

    public function addCentury(): DateTimeInterface
    {
        $this->datetime->addCentury();

        return $this;
    }

    public function subCenturies(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturies($value);

        return $this;
    }

    public function subCentury(): DateTimeInterface
    {
        $this->datetime->subCentury();

        return $this;
    }

    public function addCenturiesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturiesWithOverflow($value);

        return $this;
    }

    public function addCenturyWithOverflow(): DateTimeInterface
    {
        $this->datetime->addCenturyWithOverflow();

        return $this;
    }

    public function subCenturiesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturiesWithOverflow($value);

        return $this;
    }

    public function subCenturyWithOverflow(): DateTimeInterface
    {
        $this->datetime->subCenturyWithOverflow();

        return $this;
    }

    public function addCenturiesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturiesWithoutOverflow($value);

        return $this;
    }

    public function addCenturyWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addCenturyWithoutOverflow();

        return $this;
    }

    public function subCenturiesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturiesWithoutOverflow($value);

        return $this;
    }

    public function subCenturyWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subCenturyWithoutOverflow();

        return $this;
    }

    public function addCenturiesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturiesWithNoOverflow($value);

        return $this;
    }

    public function addCenturyWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addCenturyWithNoOverflow();

        return $this;
    }

    public function subCenturiesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturiesWithNoOverflow($value);

        return $this;
    }

    public function subCenturyWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subCenturyWithNoOverflow();

        return $this;
    }

    public function addCenturiesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addCenturiesNoOverflow($value);

        return $this;
    }

    public function addCenturyNoOverflow(): DateTimeInterface
    {
        $this->datetime->addCenturyNoOverflow();

        return $this;
    }

    public function subCenturiesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subCenturiesNoOverflow($value);

        return $this;
    }

    public function subCenturyNoOverflow(): DateTimeInterface
    {
        $this->datetime->subCenturyNoOverflow();

        return $this;
    }

    public function addDecades(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecades($value);

        return $this;
    }

    public function addDecade(): DateTimeInterface
    {
        $this->datetime->addDecade();

        return $this;
    }

    public function subDecades(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecades($value);

        return $this;
    }

    public function subDecade(): DateTimeInterface
    {
        $this->datetime->subDecade();

        return $this;
    }

    public function addDecadesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecadesWithOverflow($value);

        return $this;
    }

    public function addDecadeWithOverflow(): DateTimeInterface
    {
        $this->datetime->addDecadeWithOverflow();

        return $this;
    }

    public function subDecadesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecadesWithOverflow($value);

        return $this;
    }

    public function subDecadeWithOverflow(): DateTimeInterface
    {
        $this->datetime->subDecadeWithOverflow();

        return $this;
    }

    public function addDecadesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecadesWithoutOverflow($value);

        return $this;
    }

    public function addDecadeWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addDecadeWithoutOverflow();

        return $this;
    }

    public function subDecadesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecadesWithoutOverflow($value);

        return $this;
    }

    public function subDecadeWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subDecadeWithoutOverflow();

        return $this;
    }

    public function addDecadesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecadesWithNoOverflow($value);

        return $this;
    }

    public function addDecadeWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addDecadeWithNoOverflow();

        return $this;
    }

    public function subDecadesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecadesWithNoOverflow($value);

        return $this;
    }

    public function subDecadeWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subDecadeWithNoOverflow();

        return $this;
    }

    public function addDecadesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addDecadesNoOverflow($value);

        return $this;
    }

    public function addDecadeNoOverflow(): DateTimeInterface
    {
        $this->datetime->addDecadeNoOverflow();

        return $this;
    }

    public function subDecadesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subDecadesNoOverflow($value);

        return $this;
    }

    public function subDecadeNoOverflow(): DateTimeInterface
    {
        $this->datetime->subDecadeNoOverflow();

        return $this;
    }

    public function addQuarters(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuarters($value);

        return $this;
    }

    public function addQuarter(): DateTimeInterface
    {
        $this->datetime->addQuarter();

        return $this;
    }

    public function subQuarters(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuarters($value);

        return $this;
    }

    public function subQuarter(): DateTimeInterface
    {
        $this->datetime->subQuarter();

        return $this;
    }

    public function addQuartersWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuartersWithOverflow($value);

        return $this;
    }

    public function addQuarterWithOverflow(): DateTimeInterface
    {
        $this->datetime->addQuarterWithOverflow();

        return $this;
    }

    public function subQuartersWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuartersWithOverflow($value);

        return $this;
    }

    public function subQuarterWithOverflow(): DateTimeInterface
    {
        $this->datetime->subQuarterWithOverflow();

        return $this;
    }

    public function addQuartersWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuartersWithoutOverflow($value);

        return $this;
    }

    public function addQuarterWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->addQuarterWithoutOverflow();

        return $this;
    }

    public function subQuartersWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuartersWithoutOverflow($value);

        return $this;
    }

    public function subQuarterWithoutOverflow(): DateTimeInterface
    {
        $this->datetime->subQuarterWithoutOverflow();

        return $this;
    }

    public function addQuartersWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuartersWithNoOverflow($value);

        return $this;
    }

    public function addQuarterWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->addQuarterWithNoOverflow();

        return $this;
    }

    public function subQuartersWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuartersWithNoOverflow($value);

        return $this;
    }

    public function subQuarterWithNoOverflow(): DateTimeInterface
    {
        $this->datetime->subQuarterWithNoOverflow();

        return $this;
    }

    public function addQuartersNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->addQuartersNoOverflow($value);

        return $this;
    }

    public function addQuarterNoOverflow(): DateTimeInterface
    {
        $this->datetime->addQuarterNoOverflow();

        return $this;
    }

    public function subQuartersNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->datetime->subQuartersNoOverflow($value);

        return $this;
    }

    public function subQuarterNoOverflow(): DateTimeInterface
    {
        $this->datetime->subQuarterNoOverflow();

        return $this;
    }

    public function addWeeks(int $value = 1): DateTimeInterface
    {
        $this->datetime->addWeeks($value);

        return $this;
    }

    public function addWeek(): DateTimeInterface
    {
        $this->datetime->addWeek();

        return $this;
    }

    public function subWeeks(int $value = 1): DateTimeInterface
    {
        $this->datetime->subWeeks($value);

        return $this;
    }

    public function subWeek(): DateTimeInterface
    {
        $this->datetime->subWeek();

        return $this;
    }

    public function addWeekdays(int $value = 1): DateTimeInterface
    {
        $this->datetime->addWeekdays($value);

        return $this;
    }

    public function addWeekday(): DateTimeInterface
    {
        $this->datetime->addWeekday();

        return $this;
    }

    public function subWeekdays(int $value = 1): DateTimeInterface
    {
        $this->datetime->subWeekdays($value);

        return $this;
    }

    public function subWeekday(): DateTimeInterface
    {
        $this->datetime->subWeekday();

        return $this;
    }

    public function addRealMicros(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMicros($value);

        return $this;
    }

    public function addRealMicro(): DateTimeInterface
    {
        $this->datetime->addRealMicro();

        return $this;
    }

    public function subRealMicros(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMicros($value);

        return $this;
    }

    public function subRealMicro(): DateTimeInterface
    {
        $this->datetime->subRealMicro();

        return $this;
    }

    public function addRealMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMicroseconds($value);

        return $this;
    }

    public function addRealMicrosecond(): DateTimeInterface
    {
        $this->datetime->addRealMicrosecond();

        return $this;
    }

    public function subRealMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMicroseconds($value);

        return $this;
    }

    public function subRealMicrosecond(): DateTimeInterface
    {
        $this->datetime->subRealMicrosecond();

        return $this;
    }

    public function addRealMillis(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMillis($value);

        return $this;
    }

    public function addRealMilli(): DateTimeInterface
    {
        $this->datetime->addRealMilli();

        return $this;
    }

    public function subRealMillis(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMillis($value);

        return $this;
    }

    public function subRealMilli(): DateTimeInterface
    {
        $this->datetime->subRealMilli();

        return $this;
    }

    public function addRealMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMilliseconds($value);

        return $this;
    }

    public function addRealMillisecond(): DateTimeInterface
    {
        $this->datetime->addRealMillisecond();

        return $this;
    }

    public function subRealMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMilliseconds($value);

        return $this;
    }

    public function subRealMillisecond(): DateTimeInterface
    {
        $this->datetime->subRealMillisecond();

        return $this;
    }

    public function addRealSeconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealSeconds($value);

        return $this;
    }

    public function addRealSecond(): DateTimeInterface
    {
        $this->datetime->addRealSecond();

        return $this;
    }

    public function subRealSeconds(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealSeconds($value);

        return $this;
    }

    public function subRealSecond(): DateTimeInterface
    {
        $this->datetime->subRealSecond();

        return $this;
    }

    public function addRealMinutes(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMinutes($value);

        return $this;
    }

    public function addRealMinute(): DateTimeInterface
    {
        $this->datetime->addRealMinute();

        return $this;
    }

    public function subRealMinutes(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMinutes($value);

        return $this;
    }

    public function subRealMinute(): DateTimeInterface
    {
        $this->datetime->subRealMinute();

        return $this;
    }

    public function addRealHours(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealHours($value);

        return $this;
    }

    public function addRealHour(): DateTimeInterface
    {
        $this->datetime->addRealHour();

        return $this;
    }

    public function subRealHours(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealHours($value);

        return $this;
    }

    public function subRealHour(): DateTimeInterface
    {
        $this->datetime->subRealHour();

        return $this;
    }

    public function addRealDays(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealDays($value);

        return $this;
    }

    public function addRealDay(): DateTimeInterface
    {
        $this->datetime->addRealDay();

        return $this;
    }

    public function subRealDays(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealDays($value);

        return $this;
    }

    public function subRealDay(): DateTimeInterface
    {
        $this->datetime->subRealDay();

        return $this;
    }

    public function addRealWeeks(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealWeeks($value);

        return $this;
    }

    public function addRealWeek(): DateTimeInterface
    {
        $this->datetime->addRealWeek();

        return $this;
    }

    public function subRealWeeks(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealWeeks($value);

        return $this;
    }

    public function subRealWeek(): DateTimeInterface
    {
        $this->datetime->subRealWeek();

        return $this;
    }

    public function addRealMonths(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMonths($value);

        return $this;
    }

    public function addRealMonth(): DateTimeInterface
    {
        $this->datetime->addRealMonth();

        return $this;
    }

    public function subRealMonths(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMonths($value);

        return $this;
    }

    public function subRealMonth(): DateTimeInterface
    {
        $this->datetime->subRealMonth();

        return $this;
    }

    public function addRealQuarters(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealQuarters($value);

        return $this;
    }

    public function addRealQuarter(): DateTimeInterface
    {
        $this->datetime->addRealQuarter();

        return $this;
    }

    public function subRealQuarters(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealQuarters($value);

        return $this;
    }

    public function subRealQuarter(): DateTimeInterface
    {
        $this->datetime->subRealQuarter();

        return $this;
    }

    public function addRealYears(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealYears($value);

        return $this;
    }

    public function addRealYear(): DateTimeInterface
    {
        $this->datetime->addRealYear();

        return $this;
    }

    public function subRealYears(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealYears($value);

        return $this;
    }

    public function subRealYear(): DateTimeInterface
    {
        $this->datetime->subRealYear();

        return $this;
    }

    public function addRealDecades(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealDecades($value);

        return $this;
    }

    public function addRealDecade(): DateTimeInterface
    {
        $this->datetime->addRealDecade();

        return $this;
    }

    public function subRealDecades(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealDecades($value);

        return $this;
    }

    public function subRealDecade(): DateTimeInterface
    {
        $this->datetime->subRealDecade();

        return $this;
    }

    public function addRealCenturies(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealCenturies($value);

        return $this;
    }

    public function addRealCentury(): DateTimeInterface
    {
        $this->datetime->addRealCentury();

        return $this;
    }

    public function subRealCenturies(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealCenturies($value);

        return $this;
    }

    public function subRealCentury(): DateTimeInterface
    {
        $this->datetime->subRealCentury();

        return $this;
    }

    public function addRealMillennia(int $value = 1): DateTimeInterface
    {
        $this->datetime->addRealMillennia($value);

        return $this;
    }

    public function addRealMillennium(): DateTimeInterface
    {
        $this->datetime->addRealMillennium();

        return $this;
    }

    public function subRealMillennia(int $value = 1): DateTimeInterface
    {
        $this->datetime->subRealMillennia($value);

        return $this;
    }

    public function subRealMillennium(): DateTimeInterface
    {
        $this->datetime->subRealMillennium();

        return $this;
    }

    public function roundYear($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundYear($precision, $function);

        return $this;
    }

    public function roundYears($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundYears($precision, $function);

        return $this;
    }

    public function floorYear($precision = 1): DateTimeInterface
    {
        $this->datetime->floorYear($precision);

        return $this;
    }

    public function floorYears($precision = 1): DateTimeInterface
    {
        $this->datetime->floorYears($precision);

        return $this;
    }

    public function ceilYear($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilYear($precision);

        return $this;
    }

    public function ceilYears($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilYears($precision);

        return $this;
    }

    public function roundMonth($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMonth($precision, $function);

        return $this;
    }

    public function roundMonths($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMonths($precision, $function);

        return $this;
    }

    public function floorMonth($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMonth($precision);

        return $this;
    }

    public function floorMonths($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMonths($precision);

        return $this;
    }

    public function ceilMonth($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMonth($precision);

        return $this;
    }

    public function ceilMonths($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMonths($precision);

        return $this;
    }

    public function roundDay($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundDay($precision, $function);

        return $this;
    }

    public function roundDays($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundDays($precision, $function);

        return $this;
    }

    public function floorDay($precision = 1): DateTimeInterface
    {
        $this->datetime->floorDay($precision);

        return $this;
    }

    public function floorDays($precision = 1): DateTimeInterface
    {
        $this->datetime->floorDays($precision);

        return $this;
    }

    public function ceilDay($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilDay($precision);

        return $this;
    }

    public function ceilDays($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilDays($precision);

        return $this;
    }

    public function roundHour($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundHour($precision, $function);

        return $this;
    }

    public function roundHours($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundHours($precision, $function);

        return $this;
    }

    public function floorHour($precision = 1): DateTimeInterface
    {
        $this->datetime->floorHour($precision);

        return $this;
    }

    public function floorHours($precision = 1): DateTimeInterface
    {
        $this->datetime->floorHours($precision);

        return $this;
    }

    public function ceilHour($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilHour($precision);

        return $this;
    }

    public function ceilHours($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilHours($precision);

        return $this;
    }

    public function roundMinute($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMinute($precision, $function);

        return $this;
    }

    public function roundMinutes($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMinutes($precision, $function);

        return $this;
    }

    public function floorMinute($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMinute($precision);

        return $this;
    }

    public function floorMinutes($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMinutes($precision);

        return $this;
    }

    public function ceilMinute($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMinute($precision);

        return $this;
    }

    public function ceilMinutes($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMinutes($precision);

        return $this;
    }

    public function roundSecond($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundSecond($precision, $function);

        return $this;
    }

    public function roundSeconds($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundSeconds($precision, $function);

        return $this;
    }

    public function floorSecond($precision = 1): DateTimeInterface
    {
        $this->datetime->floorSecond($precision);

        return $this;
    }

    public function floorSeconds($precision = 1): DateTimeInterface
    {
        $this->datetime->floorSeconds($precision);

        return $this;
    }

    public function ceilSecond($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilSecond($precision);

        return $this;
    }

    public function ceilSeconds($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilSeconds($precision);

        return $this;
    }

    public function roundMillennium($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMillennium($precision, $function);

        return $this;
    }

    public function roundMillennia($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMillennia($precision, $function);

        return $this;
    }

    public function floorMillennium($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMillennium($precision);

        return $this;
    }

    public function floorMillennia($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMillennia($precision);

        return $this;
    }

    public function ceilMillennium($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMillennium($precision);

        return $this;
    }

    public function ceilMillennia($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMillennia($precision);

        return $this;
    }

    public function roundCentury($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundCentury($precision, $function);

        return $this;
    }

    public function roundCenturies($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundCenturies($precision, $function);

        return $this;
    }

    public function floorCentury($precision = 1): DateTimeInterface
    {
        $this->datetime->floorCentury($precision);

        return $this;
    }

    public function floorCenturies($precision = 1): DateTimeInterface
    {
        $this->datetime->floorCenturies($precision);

        return $this;
    }

    public function ceilCentury($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilCentury($precision);

        return $this;
    }

    public function ceilCenturies($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilCenturies($precision);

        return $this;
    }

    public function roundDecade($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundDecade($precision, $function);

        return $this;
    }

    public function roundDecades($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundDecades($precision, $function);

        return $this;
    }

    public function floorDecade($precision = 1): DateTimeInterface
    {
        $this->datetime->floorDecade($precision);

        return $this;
    }

    public function floorDecades($precision = 1): DateTimeInterface
    {
        $this->datetime->floorDecades($precision);

        return $this;
    }

    public function ceilDecade($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilDecade($precision);

        return $this;
    }

    public function ceilDecades($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilDecades($precision);

        return $this;
    }

    public function roundQuarter($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundQuarter($precision, $function);

        return $this;
    }

    public function roundQuarters($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundQuarters($precision, $function);

        return $this;
    }

    public function floorQuarter($precision = 1): DateTimeInterface
    {
        $this->datetime->floorQuarter($precision);

        return $this;
    }

    public function floorQuarters($precision = 1): DateTimeInterface
    {
        $this->datetime->floorQuarters($precision);

        return $this;
    }

    public function ceilQuarter($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilQuarter($precision);

        return $this;
    }

    public function ceilQuarters($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilQuarters($precision);

        return $this;
    }

    public function roundMillisecond($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMillisecond($precision, $function);

        return $this;
    }

    public function roundMilliseconds($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMilliseconds($precision, $function);

        return $this;
    }

    public function floorMillisecond($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMillisecond($precision);

        return $this;
    }

    public function floorMilliseconds($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMilliseconds($precision);

        return $this;
    }

    public function ceilMillisecond($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMillisecond($precision);

        return $this;
    }

    public function ceilMilliseconds($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMilliseconds($precision);

        return $this;
    }

    public function roundMicrosecond($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMicrosecond($precision, $function);

        return $this;
    }

    public function roundMicroseconds($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->datetime->roundMicroseconds($precision, $function);

        return $this;
    }

    public function floorMicrosecond($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMicrosecond($precision);

        return $this;
    }

    public function floorMicroseconds($precision = 1): DateTimeInterface
    {
        $this->datetime->floorMicroseconds($precision);

        return $this;
    }

    public function ceilMicrosecond($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMicrosecond($precision);

        return $this;
    }

    public function ceilMicroseconds($precision = 1): DateTimeInterface
    {
        $this->datetime->ceilMicroseconds($precision);

        return $this;
    }

    public function shortAbsoluteDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->shortAbsoluteDiffForHumans($other, $parts)
        ;
    }

    public function longAbsoluteDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->longAbsoluteDiffForHumans($other, $parts)
        ;
    }

    public function shortRelativeDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->shortRelativeDiffForHumans($other, $parts)
        ;
    }

    public function longRelativeDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->longRelativeDiffForHumans($other, $parts)
        ;
    }

    public function shortRelativeToNowDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->shortRelativeToNowDiffForHumans($other, $parts)
        ;
    }

    public function longRelativeToNowDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->longRelativeToNowDiffForHumans($other, $parts)
        ;
    }

    public function shortRelativeToOtherDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->shortRelativeToOtherDiffForHumans($other, $parts)
        ;
    }

    public function longRelativeToOtherDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->datetime
            ->longRelativeToOtherDiffForHumans($other, $parts)
        ;
    }

    /**
     * @throws \Exception
     */
    public function copy(): DateTimeInterface
    {
        $copy = $this->datetime->copy();

        return DateTime::of($copy);
    }

    public function clone(): DateTimeInterface
    {
        $clone = $this->datetime->clone();

        return DateTime::of($clone);
    }

    public function nowWithSameTz(): DateTimeInterface
    {
        $this->datetime->nowWithSameTz();

        return $this;
    }

    public function get(string $name)
    {
        return $this->datetime->get($name);
    }

    public function set($name, $value = null): DateTimeInterface
    {
        $this->datetime->set($name, $value);

        return $this;
    }

    public function getTranslatedDayName($context = null, string $keySuffix = '', $defaultValue = null): string
    {
        return $this->datetime
            ->getTranslatedDayName($context, $keySuffix, $defaultValue)
        ;
    }

    public function getTranslatedShortDayName($context = null): string
    {
        return $this->datetime
            ->getTranslatedShortDayName($context)
        ;
    }

    public function getTranslatedMinDayName($context = null): string
    {
        return $this->datetime
            ->getTranslatedMinDayName($context)
        ;
    }

    public function getTranslatedMonthName($context = null, string $keySuffix = '', $defaultValue = null): string
    {
        return $this->datetime
            ->getTranslatedMonthName($context, $keySuffix, $defaultValue)
        ;
    }

    public function getTranslatedShortMonthName($context = null): string
    {
        return $this->datetime
            ->getTranslatedShortMonthName($context)
        ;
    }

    public function weekday($value = null): int
    {
        return $this->datetime
            ->weekday($value)
        ;
    }

    public function isoWeekday($value = null): int
    {
        return $this->datetime
            ->isoWeekday($value)
        ;
    }

    public function getDaysFromStartOfWeek($weekStartsAt = null): int
    {
        return $this->datetime
            ->getDaysFromStartOfWeek($weekStartsAt)
        ;
    }

    public function setDaysFromStartOfWeek(int $numberOfDays, $weekStartsAt = null): DateTimeInterface
    {
        $this->datetime->setDaysFromStartOfWeek($numberOfDays, $weekStartsAt);

        return $this;
    }

    public function setUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface
    {
        $this->datetime->setUnitNoOverflow($valueUnit, $value, $overflowUnit);

        return $this;
    }

    public function addUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface
    {
        $this->datetime->addUnitNoOverflow($valueUnit, $value, $overflowUnit);

        return $this;
    }

    public function subUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface
    {
        $this->datetime->subUnitNoOverflow($valueUnit, $value, $overflowUnit);

        return $this;
    }

    public function utcOffset($minuteOffset = null): DateTimeInterface
    {
        $this->datetime->utcOffset($minuteOffset);

        return $this;
    }

    public function setDate(int $year, int $month, int $day): DateTimeInterface
    {
        $this->datetime->setDate($year, $month, $day);

        return $this;
    }

    public function setISODate(int $year, int $week, int $day = 1): DateTimeInterface
    {
        $this->datetime->setISODate($year, $week, $day);

        return $this;
    }

    public function setDateTime(int $year, int $month, int $day, int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface
    {
        $this->datetime->setDateTime($year, $month, $day, $hour, $minute, $second, $microseconds);

        return $this;
    }

    public function setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface
    {
        $this->datetime->setTime($hour, $minute, $second, $microseconds);

        return $this;
    }

    public function setTimestamp($unixTimestamp): DateTimeInterface
    {
        $this->datetime->setTimestamp($unixTimestamp);

        return $this;
    }

    public function setTimeFromTimeString(string $time): DateTimeInterface
    {
        $this->datetime->setTimeFromTimeString($time);

        return $this;
    }

    public function shiftTimezone($value): DateTimeInterface
    {
        $this->datetime->shiftTimezone($value);

        return $this;
    }

    public function setDateFrom($date = null): DateTimeInterface
    {
        $this->datetime->setDateFrom($date);

        return $this;
    }

    public function setTimeFrom($date = null): DateTimeInterface
    {
        $this->datetime->setTimeFrom($date);

        return $this;
    }

    public function setDateTimeFrom($date = null): DateTimeInterface
    {
        $this->datetime->setDateTimeFrom($date);

        return $this;
    }

    public function getDays(): array
    {
        return $this->datetime::getDays();
    }

    public function getWeekStartsAt(): int
    {
        return $this->datetime::getWeekStartsAt();
    }

    public function getWeekEndsAt(): int
    {
        return $this->datetime::getWeekEndsAt();
    }

    public function getWeekendDays(): array
    {
        return $this->datetime::getWeekendDays();
    }

    public function hasRelativeKeywords(string $time): BoolEnum
    {
        $hasRelativeKeywords = $this->datetime::hasRelativeKeywords($time);

        return BoolEnum::fromBool($hasRelativeKeywords);
    }

    public function getIsoFormats($locale = null): array
    {
        return $this->datetime
            ->getIsoFormats($locale)
        ;
    }

    public function getCalendarFormats($locale = null): array
    {
        return $this->datetime
            ->getCalendarFormats($locale)
        ;
    }

    /**
     * @return array<string, string|array<array<string|int>>>|null
     */
    public function getIsoUnits()
    {
        return $this->datetime::getIsoUnits();
    }

    public function getPaddedUnit(string $unit, int $length = 2, string $padString = '0', int $padType = STR_PAD_LEFT): string
    {
        return $this->datetime
            ->getPaddedUnit($unit, $length, $padString, $padType)
        ;
    }

    public function ordinal(string $key, $period = null): string
    {
        return $this->datetime
            ->ordinal($key, $period)
        ;
    }

    public function getAltNumber(string $key): string
    {
        return $this->datetime
            ->getAltNumber($key)
        ;
    }

    public function isoFormat(string $format, $originalFormat = null): string
    {
        return $this->datetime
            ->isoFormat($format, $originalFormat)
        ;
    }

    /**
     * @return array<string, bool|string>|null
     */
    public function getFormatsToIsoReplacements()
    {
        return $this->datetime::getFormatsToIsoReplacements();
    }

    public function translatedFormat(string $format): string
    {
        return $this->datetime
            ->translatedFormat($format)
        ;
    }

    public function getOffsetString(string $separator = ':'): string
    {
        return $this->datetime
            ->getOffsetString($separator)
        ;
    }

    public function setUnit(string $unit, $value = null): DateTimeInterface
    {
        $this->datetime->setUnit($unit, $value);

        return $this;
    }

    public function singularUnit(string $unit): string
    {
        return $this->datetime::singularUnit($unit);
    }

    public function pluralUnit(string $unit): string
    {
        return $this->datetime::pluralUnit($unit);
    }
}
