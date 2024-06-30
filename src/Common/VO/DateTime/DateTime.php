<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\DateTime;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\BoolEnum;
use Carbon\Carbon;
use DateInterval;
use DateTimeZone;

final class DateTime implements DateTimeInterface
{
    use NullTrait;

    private Carbon $carbon;

    private function __construct(Carbon $datetime)
    {
        $this->carbon = $datetime;
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
        $noon = $this->carbon
            ->copy()
            ->setTime(12, 0)
        ;

        $lt = $this->carbon
            ->lt($noon)
        ;

        return BoolEnum::fromBool($lt);
    }

    /**
     * @api
     */
    public function isAfter(\DateTimeInterface $datetime): BoolEnum
    {
        $gt = $this->carbon
            ->gt($datetime)
        ;

        return BoolEnum::fromBool($gt);
    }

    /**
     * @api
     */
    public function isAfterOrEqual(\DateTimeInterface $datetime): BoolEnum
    {
        $gte = $this->carbon
            ->gte($datetime)
        ;

        return BoolEnum::fromBool($gte);
    }

    /**
     * @api
     */
    public function isBefore(\DateTimeInterface $datetime): BoolEnum
    {
        $lt = $this->carbon
            ->lt($datetime)
        ;

        return BoolEnum::fromBool($lt);
    }

    /**
     * @api
     */
    public function isBeforeOrEqual(\DateTimeInterface $datetime): BoolEnum
    {
        $lte = $this->carbon
            ->lte($datetime)
        ;

        return BoolEnum::fromBool($lte);
    }

    /**
     * @api
     */
    public function isBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $between = $this->carbon
            ->between($datetime1, $datetime2, false)
        ;

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     */
    public function isBetweenOrEqual(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $between = $this->carbon
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
        $eq = $this->carbon
            ->eq($datetime)
        ;

        return BoolEnum::fromBool($eq);
    }

    /**
     * @api
     */
    public function isSameOrAfter(\DateTimeInterface $datetime): BoolEnum
    {
        $gte = $this->carbon
            ->gte($datetime)
        ;

        return BoolEnum::fromBool($gte);
    }

    /**
     * @api
     */
    public function isSameOrBefore(\DateTimeInterface $datetime): BoolEnum
    {
        $lte = $this->carbon
            ->lte($datetime)
        ;

        return BoolEnum::fromBool($lte);
    }

    /**
     * @api
     */
    public function isSameOrBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum
    {
        $between = $this->carbon
            ->between($datetime1, $datetime2)
        ;

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     */
    public function isWeekday(): BoolEnum
    {
        $isWeekday = $this->carbon
            ->isWeekday()
        ;

        return BoolEnum::fromBool($isWeekday);
    }

    /**
     * @api
     */
    public function isWeekend(): BoolEnum
    {
        $isWeekend = $this->carbon
            ->isWeekend()
        ;

        return BoolEnum::fromBool($isWeekend);
    }

    /**
     * @api
     */
    public function toDateTime(): \DateTimeInterface
    {
        return $this->carbon->toDateTime();
    }

    /**
     * @param \DateTimeZone|string|null $timezone
     */
    public function setTimezone($timezone = null): DateTimeInterface
    {
        $this->carbon->setTimezone($timezone);

        return $this;
    }

    public function year(): int
    {
        return $this->carbon
            ->year;
    }

    public function yearIso(): int
    {
        return $this->carbon
            ->yearIso;
    }

    public function month(): int
    {
        return $this->carbon
            ->month;
    }

    public function day(): int
    {
        return $this->carbon
            ->day;
    }

    public function hour(): int
    {
        return $this->carbon
            ->hour;
    }

    public function minute(): int
    {
        return $this->carbon
            ->minute;
    }

    public function second(): int
    {
        return $this->carbon
            ->second;
    }

    public function micro(): int
    {
        return $this->carbon
            ->micro;
    }

    public function microsecond(): int
    {
        return $this->carbon
            ->microsecond;
    }

    public function timestamp()
    {
        return $this->carbon
            ->timestamp;
    }

    public function englishDayOfWeek(): string
    {
        return $this->carbon
            ->englishDayOfWeek;
    }

    public function shortEnglishDayOfWeek(): string
    {
        return $this->carbon
            ->shortEnglishDayOfWeek;
    }

    public function englishMonth(): string
    {
        return $this->carbon
            ->englishMonth;
    }

    public function shortEnglishMonth(): string
    {
        return $this->carbon
            ->shortEnglishMonth;
    }

    public function milliseconds(): int
    {
        return $this->carbon
            ->milliseconds;
    }

    public function millisecond(): int
    {
        return $this->carbon
            ->millisecond;
    }

    public function milli(): int
    {
        return $this->carbon
            ->milli;
    }

    public function week(): int
    {
        return $this->carbon
            ->week;
    }

    public function isoWeek(): int
    {
        return $this->carbon
            ->isoWeek;
    }

    public function weekYear(): int
    {
        return $this->carbon
            ->weekYear;
    }

    public function isoWeekYear(): int
    {
        return $this->carbon
            ->isoWeekYear;
    }

    public function dayOfYear(): int
    {
        return $this->carbon
            ->dayOfYear;
    }

    public function age(): int
    {
        return $this->carbon
            ->age;
    }

    public function offset(): int
    {
        return $this->carbon
            ->offset;
    }

    public function offsetMinutes(): int
    {
        return $this->carbon
            ->offsetMinutes;
    }

    public function offsetHours(): int
    {
        return $this->carbon
            ->offsetHours;
    }

    public function dayOfWeek(): int
    {
        return $this->carbon
            ->dayOfWeek;
    }

    public function dayOfWeekIso(): int
    {
        return $this->carbon
            ->dayOfWeekIso;
    }

    public function weekOfYear(): int
    {
        return $this->carbon
            ->weekOfYear;
    }

    public function daysInMonth(): int
    {
        return $this->carbon
            ->daysInMonth;
    }

    public function latinMeridiem(): string
    {
        return $this->carbon
            ->latinMeridiem;
    }

    public function latinUpperMeridiem(): string
    {
        return $this->carbon
            ->latinUpperMeridiem;
    }

    public function timezoneAbbreviatedName(): string
    {
        return $this->carbon
            ->timezoneAbbreviatedName;
    }

    public function tzAbbrName(): string
    {
        return $this->carbon
            ->tzAbbrName;
    }

    public function dayName(): string
    {
        return $this->carbon
            ->dayName;
    }

    public function shortDayName(): string
    {
        return $this->carbon
            ->shortDayName;
    }

    public function minDayName(): string
    {
        return $this->carbon
            ->minDayName;
    }

    public function monthName(): string
    {
        return $this->carbon
            ->monthName;
    }

    public function shortMonthName(): string
    {
        return $this->carbon
            ->shortMonthName;
    }

    public function meridiem(): string
    {
        return $this->carbon
            ->meridiem;
    }

    public function upperMeridiem(): string
    {
        return $this->carbon
            ->upperMeridiem;
    }

    public function noZeroHour(): int
    {
        return $this->carbon
            ->noZeroHour;
    }

    public function weeksInYear(): int
    {
        return $this->carbon
            ->weeksInYear;
    }

    public function isoWeeksInYear(): int
    {
        return $this->carbon
            ->isoWeeksInYear;
    }

    public function weekOfMonth(): int
    {
        return $this->carbon
            ->weekOfMonth;
    }

    public function weekNumberInMonth(): int
    {
        return $this->carbon
            ->weekNumberInMonth;
    }

    public function firstWeekDay(): int
    {
        return $this->carbon
            ->firstWeekDay;
    }

    public function lastWeekDay(): int
    {
        return $this->carbon
            ->lastWeekDay;
    }

    public function daysInYear(): int
    {
        return $this->carbon
            ->daysInYear;
    }

    public function quarter(): int
    {
        return $this->carbon
            ->quarter;
    }

    public function decade(): int
    {
        return $this->carbon
            ->decade;
    }

    public function century(): int
    {
        return $this->carbon
            ->century;
    }

    public function millennium(): int
    {
        return $this->carbon
            ->millennium;
    }

    public function isDst(): BoolEnum
    {
        $isDst = $this->carbon
            ->isDST();

        return BoolEnum::fromBool($isDst);
    }

    public function isLocal(): BoolEnum
    {
        $isLocal = $this->carbon
            ->isLocal();

        return BoolEnum::fromBool($isLocal);
    }

    public function isUtc(): BoolEnum
    {
        $isUtc = $this->carbon
            ->isUtc();

        return BoolEnum::fromBool($isUtc);
    }

    public function timezoneName(): string
    {
        return $this->carbon
            ->timezoneName;
    }

    public function tzName(): string
    {
        return $this->carbon
            ->tzName;
    }

    public function locale(): string
    {
        return $this->carbon
            ->locale;
    }

    public function isValid(): BoolEnum
    {
        $isValid = $this->carbon
            ->isValid();

        return BoolEnum::fromBool($isValid);
    }

    public function isSunday(): BoolEnum
    {
        $isSunday = $this->carbon
            ->isSunday();

        return BoolEnum::fromBool($isSunday);
    }

    public function isMonday(): BoolEnum
    {
        $isMonday = $this->carbon
            ->isMonday();

        return BoolEnum::fromBool($isMonday);
    }

    public function isTuesday(): BoolEnum
    {
        $isTuesday = $this->carbon
            ->isTuesday();

        return BoolEnum::fromBool($isTuesday);
    }

    public function isWednesday(): BoolEnum
    {
        $isWednesday = $this->carbon
            ->isWednesday();

        return BoolEnum::fromBool($isWednesday);
    }

    public function isThursday(): BoolEnum
    {
        $isThursday = $this->carbon
            ->isThursday();

        return BoolEnum::fromBool($isThursday);
    }

    public function isFriday(): BoolEnum
    {
        $isFriday = $this->carbon
            ->isFriday();

        return BoolEnum::fromBool($isFriday);
    }

    public function isSaturday(): BoolEnum
    {
        $isSaturday = $this->carbon
            ->isSaturday();

        return BoolEnum::fromBool($isSaturday);
    }

    public function isSameYear($date = null): BoolEnum
    {
        $isSameYear = $this->carbon
            ->isSameYear($date);

        return BoolEnum::fromBool($isSameYear);
    }

    public function isSameWeek($date = null): BoolEnum
    {
        $isSameWeek = $this->carbon
            ->isSameWeek($date);

        return BoolEnum::fromBool($isSameWeek);
    }

    public function isSameDay($date = null): BoolEnum
    {
        $isSameDay = $this->carbon
            ->isSameDay($date);

        return BoolEnum::fromBool($isSameDay);
    }

    public function isSameHour($date = null): BoolEnum
    {
        $isSameHour = $this->carbon
            ->isSameHour($date);

        return BoolEnum::fromBool($isSameHour);
    }

    public function isSameMinute($date = null): BoolEnum
    {
        $isSameMinute = $this->carbon
            ->isSameMinute($date);

        return BoolEnum::fromBool($isSameMinute);
    }

    public function isSameSecond($date = null): BoolEnum
    {
        $isSameSecond = $this->carbon
            ->isSameSecond($date);

        return BoolEnum::fromBool($isSameSecond);
    }

    public function isSameMicro($date = null): BoolEnum
    {
        $isSameMicro = $this->carbon
            ->isSameMicro($date);

        return BoolEnum::fromBool($isSameMicro);
    }

    public function isSameMicrosecond($date = null): BoolEnum
    {
        $isSameMicrosecond = $this->carbon
            ->isSameMicrosecond($date);

        return BoolEnum::fromBool($isSameMicrosecond);
    }

    public function isSameDecade($date = null): BoolEnum
    {
        $isSameDecade = $this->carbon
            ->isSameDecade($date);

        return BoolEnum::fromBool($isSameDecade);
    }

    public function isSameCentury($date = null): BoolEnum
    {
        $isSameCentury = $this->carbon
            ->isSameCentury($date);

        return BoolEnum::fromBool($isSameCentury);
    }

    public function isSameMillennium($date = null): BoolEnum
    {
        $isSameMillennium = $this->carbon
            ->isSameMillennium($date);

        return BoolEnum::fromBool($isSameMillennium);
    }

    public function years(int $value): DateTimeInterface
    {
        $this->carbon->years($value);

        return $this;
    }

    public function setYears(int $value): DateTimeInterface
    {
        $this->carbon->setYears($value);

        return $this;
    }

    public function setYear(int $value): DateTimeInterface
    {
        $this->carbon->setYear($value);

        return $this;
    }

    public function months(int $value): DateTimeInterface
    {
        $this->carbon->months($value);

        return $this;
    }

    public function setMonths(int $value): DateTimeInterface
    {
        $this->carbon->setMonths($value);

        return $this;
    }

    public function setMonth(int $value): DateTimeInterface
    {
        $this->carbon->setMonth($value);

        return $this;
    }

    public function setDays(int $value): DateTimeInterface
    {
        $this->carbon->setDays($value);

        return $this;
    }

    public function setDay(int $value): DateTimeInterface
    {
        $this->carbon->setDay($value);

        return $this;
    }

    public function hours(int $value): DateTimeInterface
    {
        $this->carbon->hours($value);

        return $this;
    }

    public function setHours(int $value): DateTimeInterface
    {
        $this->carbon->setHours($value);

        return $this;
    }

    public function setHour(int $value): DateTimeInterface
    {
        $this->carbon->setHour($value);

        return $this;
    }

    public function minutes(int $value): DateTimeInterface
    {
        $this->carbon->minutes($value);

        return $this;
    }

    public function setMinutes(int $value): DateTimeInterface
    {
        $this->carbon->setMinutes($value);

        return $this;
    }

    public function setMinute(int $value): DateTimeInterface
    {
        $this->carbon->setMinute($value);

        return $this;
    }

    public function seconds(int $value): DateTimeInterface
    {
        $this->carbon->seconds($value);

        return $this;
    }

    public function setSeconds(int $value): DateTimeInterface
    {
        $this->carbon->setSeconds($value);

        return $this;
    }

    public function setSecond(int $value): DateTimeInterface
    {
        $this->carbon->setSecond($value);

        return $this;
    }

    public function millis(int $value): DateTimeInterface
    {
        $this->carbon->millis($value);

        return $this;
    }

    public function setMillis(int $value): DateTimeInterface
    {
        $this->carbon->setMillis($value);

        return $this;
    }

    public function setMilli(int $value): DateTimeInterface
    {
        $this->carbon->setMilli($value);

        return $this;
    }

    public function setMilliseconds(int $value): DateTimeInterface
    {
        $this->carbon->setMilliseconds($value);

        return $this;
    }

    public function setMillisecond(int $value): DateTimeInterface
    {
        $this->carbon->setMillisecond($value);

        return $this;
    }

    public function micros(int $value): DateTimeInterface
    {
        $this->carbon->micros($value);

        return $this;
    }

    public function setMicros(int $value): DateTimeInterface
    {
        $this->carbon->setMicros($value);

        return $this;
    }

    public function setMicro(int $value): DateTimeInterface
    {
        $this->carbon->setMicro($value);

        return $this;
    }

    public function microseconds(int $value): DateTimeInterface
    {
        $this->carbon->microseconds($value);

        return $this;
    }

    public function setMicroseconds(int $value): DateTimeInterface
    {
        $this->carbon->setMicroseconds($value);

        return $this;
    }

    public function setMicrosecond(int $value): DateTimeInterface
    {
        $this->carbon->setMicrosecond($value);

        return $this;
    }

    public function addYears(int $value = 1): DateTimeInterface
    {
        $this->carbon->addYears($value);

        return $this;
    }

    public function addYear(): DateTimeInterface
    {
        $this->carbon->addYear();

        return $this;
    }

    public function subYears(int $value = 1): DateTimeInterface
    {
        $this->carbon->subYears($value);

        return $this;
    }

    public function subYear(): DateTimeInterface
    {
        $this->carbon->subYear();

        return $this;
    }

    public function addYearsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addYearsWithOverflow($value);

        return $this;
    }

    public function addYearWithOverflow(): DateTimeInterface
    {
        $this->carbon->addYearWithOverflow();

        return $this;
    }

    public function subYearsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subYearsWithOverflow($value);

        return $this;
    }

    public function subYearWithOverflow(): DateTimeInterface
    {
        $this->carbon->subYearWithOverflow();

        return $this;
    }

    public function addYearsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addYearsWithoutOverflow($value);

        return $this;
    }

    public function addYearWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->addYearWithoutOverflow();

        return $this;
    }

    public function subYearsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subYearsWithoutOverflow($value);

        return $this;
    }

    public function subYearWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->subYearWithoutOverflow();

        return $this;
    }

    public function addYearsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addYearsWithNoOverflow($value);

        return $this;
    }

    public function addYearWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->addYearWithNoOverflow();

        return $this;
    }

    public function subYearsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subYearsWithNoOverflow($value);

        return $this;
    }

    public function subYearWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->subYearWithNoOverflow();

        return $this;
    }

    public function addYearsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addYearsNoOverflow($value);

        return $this;
    }

    public function addYearNoOverflow(): DateTimeInterface
    {
        $this->carbon->addYearNoOverflow();

        return $this;
    }

    public function subYearsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subYearsNoOverflow($value);

        return $this;
    }

    public function subYearNoOverflow(): DateTimeInterface
    {
        $this->carbon->subYearNoOverflow();

        return $this;
    }

    public function addMonths(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMonths($value);

        return $this;
    }

    public function addMonth(): DateTimeInterface
    {
        $this->carbon->addMonth();

        return $this;
    }

    public function subMonths(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMonths($value);

        return $this;
    }

    public function subMonth(): DateTimeInterface
    {
        $this->carbon->subMonth();

        return $this;
    }

    public function addMonthsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMonthsWithOverflow($value);

        return $this;
    }

    public function addMonthWithOverflow(): DateTimeInterface
    {
        $this->carbon->addMonthWithOverflow();

        return $this;
    }

    public function subMonthsWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMonthsWithOverflow($value);

        return $this;
    }

    public function subMonthWithOverflow(): DateTimeInterface
    {
        $this->carbon->subMonthWithOverflow();

        return $this;
    }

    public function addMonthsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMonthsWithoutOverflow($value);

        return $this;
    }

    public function addMonthWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->addMonthWithoutOverflow();

        return $this;
    }

    public function subMonthsWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMonthsWithoutOverflow($value);

        return $this;
    }

    public function subMonthWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->subMonthWithoutOverflow();

        return $this;
    }

    public function addMonthsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMonthsWithNoOverflow($value);

        return $this;
    }

    public function addMonthWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->addMonthWithNoOverflow();

        return $this;
    }

    public function subMonthsWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMonthsWithNoOverflow($value);

        return $this;
    }

    public function subMonthWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->subMonthWithNoOverflow();

        return $this;
    }

    public function addMonthsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMonthsNoOverflow($value);

        return $this;
    }

    public function addMonthNoOverflow(): DateTimeInterface
    {
        $this->carbon->addMonthNoOverflow();

        return $this;
    }

    public function subMonthsNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMonthsNoOverflow($value);

        return $this;
    }

    public function subMonthNoOverflow(): DateTimeInterface
    {
        $this->carbon->subMonthNoOverflow();

        return $this;
    }

    public function addDays(int $value = 1): DateTimeInterface
    {
        $this->carbon->addDays($value);

        return $this;
    }

    public function addDay(): DateTimeInterface
    {
        $this->carbon->addDay();

        return $this;
    }

    public function subDays(int $value = 1): DateTimeInterface
    {
        $this->carbon->subDays($value);

        return $this;
    }

    public function subDay(): DateTimeInterface
    {
        $this->carbon->subDay();

        return $this;
    }

    public function addHours(int $value = 1): DateTimeInterface
    {
        $this->carbon->addHours($value);

        return $this;
    }

    public function addHour(): DateTimeInterface
    {
        $this->carbon->addHour();

        return $this;
    }

    public function subHours(int $value = 1): DateTimeInterface
    {
        $this->carbon->subHours($value);

        return $this;
    }

    public function subHour(): DateTimeInterface
    {
        $this->carbon->subHour();

        return $this;
    }

    public function addMinutes(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMinutes($value);

        return $this;
    }

    public function addMinute(): DateTimeInterface
    {
        $this->carbon->addMinute();

        return $this;
    }

    public function subMinutes(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMinutes($value);

        return $this;
    }

    public function subMinute(): DateTimeInterface
    {
        $this->carbon->subMinute();

        return $this;
    }

    public function addSeconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->addSeconds($value);

        return $this;
    }

    public function addSecond(): DateTimeInterface
    {
        $this->carbon->addSecond();

        return $this;
    }

    public function subSeconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->subSeconds($value);

        return $this;
    }

    public function subSecond(): DateTimeInterface
    {
        $this->carbon->subSecond();

        return $this;
    }

    public function addMillis(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMillis($value);

        return $this;
    }

    public function addMilli(): DateTimeInterface
    {
        $this->carbon->addMilli();

        return $this;
    }

    public function subMillis(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMillis($value);

        return $this;
    }

    public function subMilli(): DateTimeInterface
    {
        $this->carbon->subMilli();

        return $this;
    }

    public function addMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMilliseconds($value);

        return $this;
    }

    public function addMillisecond(): DateTimeInterface
    {
        $this->carbon->addMillisecond();

        return $this;
    }

    public function subMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMilliseconds($value);

        return $this;
    }

    public function subMillisecond(): DateTimeInterface
    {
        $this->carbon->subMillisecond();

        return $this;
    }

    public function addMicros(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMicros($value);

        return $this;
    }

    public function addMicro(): DateTimeInterface
    {
        $this->carbon->addMicro();

        return $this;
    }

    public function subMicros(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMicros($value);

        return $this;
    }

    public function subMicro(): DateTimeInterface
    {
        $this->carbon->subMicro();

        return $this;
    }

    public function addMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMicroseconds($value);

        return $this;
    }

    public function addMicrosecond(): DateTimeInterface
    {
        $this->carbon->addMicrosecond();

        return $this;
    }

    public function subMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMicroseconds($value);

        return $this;
    }

    public function subMicrosecond(): DateTimeInterface
    {
        $this->carbon->subMicrosecond();

        return $this;
    }

    public function addMillennia(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMillennia($value);

        return $this;
    }

    public function addMillennium(): DateTimeInterface
    {
        $this->carbon->addMillennium();

        return $this;
    }

    public function subMillennia(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMillennia($value);

        return $this;
    }

    public function subMillennium(): DateTimeInterface
    {
        $this->carbon->subMillennium();

        return $this;
    }

    public function addMillenniaWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMillenniaWithOverflow($value);

        return $this;
    }

    public function addMillenniumWithOverflow(): DateTimeInterface
    {
        $this->carbon->addMillenniumWithOverflow();

        return $this;
    }

    public function subMillenniaWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMillenniaWithOverflow($value);

        return $this;
    }

    public function subMillenniumWithOverflow(): DateTimeInterface
    {
        $this->carbon->subMillenniumWithOverflow();

        return $this;
    }

    public function addMillenniaWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMillenniaWithoutOverflow($value);

        return $this;
    }

    public function addMillenniumWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->addMillenniumWithoutOverflow();

        return $this;
    }

    public function subMillenniaWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMillenniaWithoutOverflow($value);

        return $this;
    }

    public function subMillenniumWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->subMillenniumWithoutOverflow();

        return $this;
    }

    public function addMillenniaWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMillenniaWithNoOverflow($value);

        return $this;
    }

    public function addMillenniumWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->addMillenniumWithNoOverflow();

        return $this;
    }

    public function subMillenniaWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMillenniaWithNoOverflow($value);

        return $this;
    }

    public function subMillenniumWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->subMillenniumWithNoOverflow();

        return $this;
    }

    public function addMillenniaNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addMillenniaNoOverflow($value);

        return $this;
    }

    public function addMillenniumNoOverflow(): DateTimeInterface
    {
        $this->carbon->addMillenniumNoOverflow();

        return $this;
    }

    public function subMillenniaNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subMillenniaNoOverflow($value);

        return $this;
    }

    public function subMillenniumNoOverflow(): DateTimeInterface
    {
        $this->carbon->subMillenniumNoOverflow();

        return $this;
    }

    public function addCenturies(int $value = 1): DateTimeInterface
    {
        $this->carbon->addCenturies($value);

        return $this;
    }

    public function addCentury(): DateTimeInterface
    {
        $this->carbon->addCentury();

        return $this;
    }

    public function subCenturies(int $value = 1): DateTimeInterface
    {
        $this->carbon->subCenturies($value);

        return $this;
    }

    public function subCentury(): DateTimeInterface
    {
        $this->carbon->subCentury();

        return $this;
    }

    public function addCenturiesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addCenturiesWithOverflow($value);

        return $this;
    }

    public function addCenturyWithOverflow(): DateTimeInterface
    {
        $this->carbon->addCenturyWithOverflow();

        return $this;
    }

    public function subCenturiesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subCenturiesWithOverflow($value);

        return $this;
    }

    public function subCenturyWithOverflow(): DateTimeInterface
    {
        $this->carbon->subCenturyWithOverflow();

        return $this;
    }

    public function addCenturiesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addCenturiesWithoutOverflow($value);

        return $this;
    }

    public function addCenturyWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->addCenturyWithoutOverflow();

        return $this;
    }

    public function subCenturiesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subCenturiesWithoutOverflow($value);

        return $this;
    }

    public function subCenturyWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->subCenturyWithoutOverflow();

        return $this;
    }

    public function addCenturiesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addCenturiesWithNoOverflow($value);

        return $this;
    }

    public function addCenturyWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->addCenturyWithNoOverflow();

        return $this;
    }

    public function subCenturiesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subCenturiesWithNoOverflow($value);

        return $this;
    }

    public function subCenturyWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->subCenturyWithNoOverflow();

        return $this;
    }

    public function addCenturiesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addCenturiesNoOverflow($value);

        return $this;
    }

    public function addCenturyNoOverflow(): DateTimeInterface
    {
        $this->carbon->addCenturyNoOverflow();

        return $this;
    }

    public function subCenturiesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subCenturiesNoOverflow($value);

        return $this;
    }

    public function subCenturyNoOverflow(): DateTimeInterface
    {
        $this->carbon->subCenturyNoOverflow();

        return $this;
    }

    public function addDecades(int $value = 1): DateTimeInterface
    {
        $this->carbon->addDecades($value);

        return $this;
    }

    public function addDecade(): DateTimeInterface
    {
        $this->carbon->addDecade();

        return $this;
    }

    public function subDecades(int $value = 1): DateTimeInterface
    {
        $this->carbon->subDecades($value);

        return $this;
    }

    public function subDecade(): DateTimeInterface
    {
        $this->carbon->subDecade();

        return $this;
    }

    public function addDecadesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addDecadesWithOverflow($value);

        return $this;
    }

    public function addDecadeWithOverflow(): DateTimeInterface
    {
        $this->carbon->addDecadeWithOverflow();

        return $this;
    }

    public function subDecadesWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subDecadesWithOverflow($value);

        return $this;
    }

    public function subDecadeWithOverflow(): DateTimeInterface
    {
        $this->carbon->subDecadeWithOverflow();

        return $this;
    }

    public function addDecadesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addDecadesWithoutOverflow($value);

        return $this;
    }

    public function addDecadeWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->addDecadeWithoutOverflow();

        return $this;
    }

    public function subDecadesWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subDecadesWithoutOverflow($value);

        return $this;
    }

    public function subDecadeWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->subDecadeWithoutOverflow();

        return $this;
    }

    public function addDecadesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addDecadesWithNoOverflow($value);

        return $this;
    }

    public function addDecadeWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->addDecadeWithNoOverflow();

        return $this;
    }

    public function subDecadesWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subDecadesWithNoOverflow($value);

        return $this;
    }

    public function subDecadeWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->subDecadeWithNoOverflow();

        return $this;
    }

    public function addDecadesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addDecadesNoOverflow($value);

        return $this;
    }

    public function addDecadeNoOverflow(): DateTimeInterface
    {
        $this->carbon->addDecadeNoOverflow();

        return $this;
    }

    public function subDecadesNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subDecadesNoOverflow($value);

        return $this;
    }

    public function subDecadeNoOverflow(): DateTimeInterface
    {
        $this->carbon->subDecadeNoOverflow();

        return $this;
    }

    public function addQuarters(int $value = 1): DateTimeInterface
    {
        $this->carbon->addQuarters($value);

        return $this;
    }

    public function addQuarter(): DateTimeInterface
    {
        $this->carbon->addQuarter();

        return $this;
    }

    public function subQuarters(int $value = 1): DateTimeInterface
    {
        $this->carbon->subQuarters($value);

        return $this;
    }

    public function subQuarter(): DateTimeInterface
    {
        $this->carbon->subQuarter();

        return $this;
    }

    public function addQuartersWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addQuartersWithOverflow($value);

        return $this;
    }

    public function addQuarterWithOverflow(): DateTimeInterface
    {
        $this->carbon->addQuarterWithOverflow();

        return $this;
    }

    public function subQuartersWithOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subQuartersWithOverflow($value);

        return $this;
    }

    public function subQuarterWithOverflow(): DateTimeInterface
    {
        $this->carbon->subQuarterWithOverflow();

        return $this;
    }

    public function addQuartersWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addQuartersWithoutOverflow($value);

        return $this;
    }

    public function addQuarterWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->addQuarterWithoutOverflow();

        return $this;
    }

    public function subQuartersWithoutOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subQuartersWithoutOverflow($value);

        return $this;
    }

    public function subQuarterWithoutOverflow(): DateTimeInterface
    {
        $this->carbon->subQuarterWithoutOverflow();

        return $this;
    }

    public function addQuartersWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addQuartersWithNoOverflow($value);

        return $this;
    }

    public function addQuarterWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->addQuarterWithNoOverflow();

        return $this;
    }

    public function subQuartersWithNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subQuartersWithNoOverflow($value);

        return $this;
    }

    public function subQuarterWithNoOverflow(): DateTimeInterface
    {
        $this->carbon->subQuarterWithNoOverflow();

        return $this;
    }

    public function addQuartersNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->addQuartersNoOverflow($value);

        return $this;
    }

    public function addQuarterNoOverflow(): DateTimeInterface
    {
        $this->carbon->addQuarterNoOverflow();

        return $this;
    }

    public function subQuartersNoOverflow(int $value = 1): DateTimeInterface
    {
        $this->carbon->subQuartersNoOverflow($value);

        return $this;
    }

    public function subQuarterNoOverflow(): DateTimeInterface
    {
        $this->carbon->subQuarterNoOverflow();

        return $this;
    }

    public function addWeeks(int $value = 1): DateTimeInterface
    {
        $this->carbon->addWeeks($value);

        return $this;
    }

    public function addWeek(): DateTimeInterface
    {
        $this->carbon->addWeek();

        return $this;
    }

    public function subWeeks(int $value = 1): DateTimeInterface
    {
        $this->carbon->subWeeks($value);

        return $this;
    }

    public function subWeek(): DateTimeInterface
    {
        $this->carbon->subWeek();

        return $this;
    }

    public function addWeekdays(int $value = 1): DateTimeInterface
    {
        $this->carbon->addWeekdays($value);

        return $this;
    }

    public function addWeekday(): DateTimeInterface
    {
        $this->carbon->addWeekday();

        return $this;
    }

    public function subWeekdays(int $value = 1): DateTimeInterface
    {
        $this->carbon->subWeekdays($value);

        return $this;
    }

    public function subWeekday(): DateTimeInterface
    {
        $this->carbon->subWeekday();

        return $this;
    }

    public function addRealMicros(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealMicros($value);

        return $this;
    }

    public function addRealMicro(): DateTimeInterface
    {
        $this->carbon->addRealMicro();

        return $this;
    }

    public function subRealMicros(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealMicros($value);

        return $this;
    }

    public function subRealMicro(): DateTimeInterface
    {
        $this->carbon->subRealMicro();

        return $this;
    }

    public function addRealMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealMicroseconds($value);

        return $this;
    }

    public function addRealMicrosecond(): DateTimeInterface
    {
        $this->carbon->addRealMicrosecond();

        return $this;
    }

    public function subRealMicroseconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealMicroseconds($value);

        return $this;
    }

    public function subRealMicrosecond(): DateTimeInterface
    {
        $this->carbon->subRealMicrosecond();

        return $this;
    }

    public function addRealMillis(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealMillis($value);

        return $this;
    }

    public function addRealMilli(): DateTimeInterface
    {
        $this->carbon->addRealMilli();

        return $this;
    }

    public function subRealMillis(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealMillis($value);

        return $this;
    }

    public function subRealMilli(): DateTimeInterface
    {
        $this->carbon->subRealMilli();

        return $this;
    }

    public function addRealMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealMilliseconds($value);

        return $this;
    }

    public function addRealMillisecond(): DateTimeInterface
    {
        $this->carbon->addRealMillisecond();

        return $this;
    }

    public function subRealMilliseconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealMilliseconds($value);

        return $this;
    }

    public function subRealMillisecond(): DateTimeInterface
    {
        $this->carbon->subRealMillisecond();

        return $this;
    }

    public function addRealSeconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealSeconds($value);

        return $this;
    }

    public function addRealSecond(): DateTimeInterface
    {
        $this->carbon->addRealSecond();

        return $this;
    }

    public function subRealSeconds(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealSeconds($value);

        return $this;
    }

    public function subRealSecond(): DateTimeInterface
    {
        $this->carbon->subRealSecond();

        return $this;
    }

    public function addRealMinutes(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealMinutes($value);

        return $this;
    }

    public function addRealMinute(): DateTimeInterface
    {
        $this->carbon->addRealMinute();

        return $this;
    }

    public function subRealMinutes(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealMinutes($value);

        return $this;
    }

    public function subRealMinute(): DateTimeInterface
    {
        $this->carbon->subRealMinute();

        return $this;
    }

    public function addRealHours(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealHours($value);

        return $this;
    }

    public function addRealHour(): DateTimeInterface
    {
        $this->carbon->addRealHour();

        return $this;
    }

    public function subRealHours(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealHours($value);

        return $this;
    }

    public function subRealHour(): DateTimeInterface
    {
        $this->carbon->subRealHour();

        return $this;
    }

    public function addRealDays(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealDays($value);

        return $this;
    }

    public function addRealDay(): DateTimeInterface
    {
        $this->carbon->addRealDay();

        return $this;
    }

    public function subRealDays(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealDays($value);

        return $this;
    }

    public function subRealDay(): DateTimeInterface
    {
        $this->carbon->subRealDay();

        return $this;
    }

    public function addRealWeeks(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealWeeks($value);

        return $this;
    }

    public function addRealWeek(): DateTimeInterface
    {
        $this->carbon->addRealWeek();

        return $this;
    }

    public function subRealWeeks(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealWeeks($value);

        return $this;
    }

    public function subRealWeek(): DateTimeInterface
    {
        $this->carbon->subRealWeek();

        return $this;
    }

    public function addRealMonths(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealMonths($value);

        return $this;
    }

    public function addRealMonth(): DateTimeInterface
    {
        $this->carbon->addRealMonth();

        return $this;
    }

    public function subRealMonths(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealMonths($value);

        return $this;
    }

    public function subRealMonth(): DateTimeInterface
    {
        $this->carbon->subRealMonth();

        return $this;
    }

    public function addRealQuarters(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealQuarters($value);

        return $this;
    }

    public function addRealQuarter(): DateTimeInterface
    {
        $this->carbon->addRealQuarter();

        return $this;
    }

    public function subRealQuarters(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealQuarters($value);

        return $this;
    }

    public function subRealQuarter(): DateTimeInterface
    {
        $this->carbon->subRealQuarter();

        return $this;
    }

    public function addRealYears(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealYears($value);

        return $this;
    }

    public function addRealYear(): DateTimeInterface
    {
        $this->carbon->addRealYear();

        return $this;
    }

    public function subRealYears(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealYears($value);

        return $this;
    }

    public function subRealYear(): DateTimeInterface
    {
        $this->carbon->subRealYear();

        return $this;
    }

    public function addRealDecades(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealDecades($value);

        return $this;
    }

    public function addRealDecade(): DateTimeInterface
    {
        $this->carbon->addRealDecade();

        return $this;
    }

    public function subRealDecades(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealDecades($value);

        return $this;
    }

    public function subRealDecade(): DateTimeInterface
    {
        $this->carbon->subRealDecade();

        return $this;
    }

    public function addRealCenturies(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealCenturies($value);

        return $this;
    }

    public function addRealCentury(): DateTimeInterface
    {
        $this->carbon->addRealCentury();

        return $this;
    }

    public function subRealCenturies(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealCenturies($value);

        return $this;
    }

    public function subRealCentury(): DateTimeInterface
    {
        $this->carbon->subRealCentury();

        return $this;
    }

    public function addRealMillennia(int $value = 1): DateTimeInterface
    {
        $this->carbon->addRealMillennia($value);

        return $this;
    }

    public function addRealMillennium(): DateTimeInterface
    {
        $this->carbon->addRealMillennium();

        return $this;
    }

    public function subRealMillennia(int $value = 1): DateTimeInterface
    {
        $this->carbon->subRealMillennia($value);

        return $this;
    }

    public function subRealMillennium(): DateTimeInterface
    {
        $this->carbon->subRealMillennium();

        return $this;
    }

    public function roundYear($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundYear($precision, $function);

        return $this;
    }

    public function roundYears($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundYears($precision, $function);

        return $this;
    }

    public function floorYear($precision = 1): DateTimeInterface
    {
        $this->carbon->floorYear($precision);

        return $this;
    }

    public function floorYears($precision = 1): DateTimeInterface
    {
        $this->carbon->floorYears($precision);

        return $this;
    }

    public function ceilYear($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilYear($precision);

        return $this;
    }

    public function ceilYears($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilYears($precision);

        return $this;
    }

    public function roundMonth($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMonth($precision, $function);

        return $this;
    }

    public function roundMonths($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMonths($precision, $function);

        return $this;
    }

    public function floorMonth($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMonth($precision);

        return $this;
    }

    public function floorMonths($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMonths($precision);

        return $this;
    }

    public function ceilMonth($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMonth($precision);

        return $this;
    }

    public function ceilMonths($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMonths($precision);

        return $this;
    }

    public function roundDay($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundDay($precision, $function);

        return $this;
    }

    public function roundDays($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundDays($precision, $function);

        return $this;
    }

    public function floorDay($precision = 1): DateTimeInterface
    {
        $this->carbon->floorDay($precision);

        return $this;
    }

    public function floorDays($precision = 1): DateTimeInterface
    {
        $this->carbon->floorDays($precision);

        return $this;
    }

    public function ceilDay($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilDay($precision);

        return $this;
    }

    public function ceilDays($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilDays($precision);

        return $this;
    }

    public function roundHour($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundHour($precision, $function);

        return $this;
    }

    public function roundHours($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundHours($precision, $function);

        return $this;
    }

    public function floorHour($precision = 1): DateTimeInterface
    {
        $this->carbon->floorHour($precision);

        return $this;
    }

    public function floorHours($precision = 1): DateTimeInterface
    {
        $this->carbon->floorHours($precision);

        return $this;
    }

    public function ceilHour($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilHour($precision);

        return $this;
    }

    public function ceilHours($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilHours($precision);

        return $this;
    }

    public function roundMinute($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMinute($precision, $function);

        return $this;
    }

    public function roundMinutes($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMinutes($precision, $function);

        return $this;
    }

    public function floorMinute($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMinute($precision);

        return $this;
    }

    public function floorMinutes($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMinutes($precision);

        return $this;
    }

    public function ceilMinute($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMinute($precision);

        return $this;
    }

    public function ceilMinutes($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMinutes($precision);

        return $this;
    }

    public function roundSecond($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundSecond($precision, $function);

        return $this;
    }

    public function roundSeconds($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundSeconds($precision, $function);

        return $this;
    }

    public function floorSecond($precision = 1): DateTimeInterface
    {
        $this->carbon->floorSecond($precision);

        return $this;
    }

    public function floorSeconds($precision = 1): DateTimeInterface
    {
        $this->carbon->floorSeconds($precision);

        return $this;
    }

    public function ceilSecond($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilSecond($precision);

        return $this;
    }

    public function ceilSeconds($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilSeconds($precision);

        return $this;
    }

    public function roundMillennium($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMillennium($precision, $function);

        return $this;
    }

    public function roundMillennia($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMillennia($precision, $function);

        return $this;
    }

    public function floorMillennium($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMillennium($precision);

        return $this;
    }

    public function floorMillennia($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMillennia($precision);

        return $this;
    }

    public function ceilMillennium($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMillennium($precision);

        return $this;
    }

    public function ceilMillennia($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMillennia($precision);

        return $this;
    }

    public function roundCentury($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundCentury($precision, $function);

        return $this;
    }

    public function roundCenturies($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundCenturies($precision, $function);

        return $this;
    }

    public function floorCentury($precision = 1): DateTimeInterface
    {
        $this->carbon->floorCentury($precision);

        return $this;
    }

    public function floorCenturies($precision = 1): DateTimeInterface
    {
        $this->carbon->floorCenturies($precision);

        return $this;
    }

    public function ceilCentury($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilCentury($precision);

        return $this;
    }

    public function ceilCenturies($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilCenturies($precision);

        return $this;
    }

    public function roundDecade($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundDecade($precision, $function);

        return $this;
    }

    public function roundDecades($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundDecades($precision, $function);

        return $this;
    }

    public function floorDecade($precision = 1): DateTimeInterface
    {
        $this->carbon->floorDecade($precision);

        return $this;
    }

    public function floorDecades($precision = 1): DateTimeInterface
    {
        $this->carbon->floorDecades($precision);

        return $this;
    }

    public function ceilDecade($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilDecade($precision);

        return $this;
    }

    public function ceilDecades($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilDecades($precision);

        return $this;
    }

    public function roundQuarter($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundQuarter($precision, $function);

        return $this;
    }

    public function roundQuarters($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundQuarters($precision, $function);

        return $this;
    }

    public function floorQuarter($precision = 1): DateTimeInterface
    {
        $this->carbon->floorQuarter($precision);

        return $this;
    }

    public function floorQuarters($precision = 1): DateTimeInterface
    {
        $this->carbon->floorQuarters($precision);

        return $this;
    }

    public function ceilQuarter($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilQuarter($precision);

        return $this;
    }

    public function ceilQuarters($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilQuarters($precision);

        return $this;
    }

    public function roundMillisecond($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMillisecond($precision, $function);

        return $this;
    }

    public function roundMilliseconds($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMilliseconds($precision, $function);

        return $this;
    }

    public function floorMillisecond($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMillisecond($precision);

        return $this;
    }

    public function floorMilliseconds($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMilliseconds($precision);

        return $this;
    }

    public function ceilMillisecond($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMillisecond($precision);

        return $this;
    }

    public function ceilMilliseconds($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMilliseconds($precision);

        return $this;
    }

    public function roundMicrosecond($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMicrosecond($precision, $function);

        return $this;
    }

    public function roundMicroseconds($precision = 1, string $function = 'round'): DateTimeInterface
    {
        $this->carbon->roundMicroseconds($precision, $function);

        return $this;
    }

    public function floorMicrosecond($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMicrosecond($precision);

        return $this;
    }

    public function floorMicroseconds($precision = 1): DateTimeInterface
    {
        $this->carbon->floorMicroseconds($precision);

        return $this;
    }

    public function ceilMicrosecond($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMicrosecond($precision);

        return $this;
    }

    public function ceilMicroseconds($precision = 1): DateTimeInterface
    {
        $this->carbon->ceilMicroseconds($precision);

        return $this;
    }

    public function shortAbsoluteDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->carbon
            ->shortAbsoluteDiffForHumans($other, $parts);
    }

    public function longAbsoluteDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->carbon
            ->longAbsoluteDiffForHumans($other, $parts);
    }

    public function shortRelativeDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->carbon
            ->shortRelativeDiffForHumans($other, $parts);
    }

    public function longRelativeDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->carbon
            ->longRelativeDiffForHumans($other, $parts);
    }

    public function shortRelativeToNowDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->carbon
            ->shortRelativeToNowDiffForHumans($other, $parts);
    }

    public function longRelativeToNowDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->carbon
            ->longRelativeToNowDiffForHumans($other, $parts);
    }

    public function shortRelativeToOtherDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->carbon
            ->shortRelativeToOtherDiffForHumans($other, $parts);
    }

    public function longRelativeToOtherDiffForHumans($other = null, int $parts = 1): string
    {
        return $this->carbon
            ->longRelativeToOtherDiffForHumans($other, $parts);
    }

    public function getRangesByUnit(int $daysInMonth = 31): array
    {
        return $this->carbon
            ::getRangesByUnit($daysInMonth);
    }

    /**
     * @throws \Exception
     */
    public function copy(): DateTimeInterface
    {
        $copy = $this->carbon->copy();

        return DateTime::of($copy);
    }

    public function clone(): DateTimeInterface
    {
        $clone = $this->carbon->clone();

        return DateTime::of($clone);
    }

    public function nowWithSameTz(): DateTimeInterface
    {
        $this->carbon->nowWithSameTz();

        return $this;
    }

    public function expectDateTime($date, $other): void
    {
        $this->carbon::expectDateTime($date, $other);
    }

    public function get(string $name)
    {
        return $this->carbon->get($name);
    }

    public function set($name, $value = null): DateTimeInterface
    {
        $this->carbon->set($name, $value);

        return $this;
    }

    public function getTranslatedFormByRegExp($baseKey, $keySuffix, $context, $subKey, $defaultValue)
    {
        return $this->carbon
            ->getTranslatedFormByRegExp($baseKey, $keySuffix, $context, $subKey, $defaultValue);
    }

    public function getTranslatedDayName($context = null, string $keySuffix = '', $defaultValue = null): string
    {
        return $this->carbon
            ->getTranslatedDayName($context, $keySuffix, $defaultValue);
    }

    public function getTranslatedShortDayName($context = null): string
    {
        return $this->carbon
            ->getTranslatedShortDayName($context);
    }

    public function getTranslatedMinDayName($context = null): string
    {
        return $this->carbon
            ->getTranslatedMinDayName($context);
    }

    public function getTranslatedMonthName($context = null, string $keySuffix = '', $defaultValue = null): string
    {
        return $this->carbon
            ->getTranslatedMonthName($context, $keySuffix, $defaultValue);
    }

    public function getTranslatedShortMonthName($context = null): string
    {
        return $this->carbon
            ->getTranslatedShortMonthName($context);
    }

    public function weekday($value = null): int
    {
        return $this->carbon
            ->weekday($value);
    }

    public function isoWeekday($value = null): int
    {
        return $this->carbon
            ->isoWeekday($value);
    }

    public function getDaysFromStartOfWeek($weekStartsAt = null): int
    {
        return $this->carbon
            ->getDaysFromStartOfWeek($weekStartsAt);
    }

    public function setDaysFromStartOfWeek(int $numberOfDays, $weekStartsAt = null): DateTimeInterface
    {
        $this->carbon->setDaysFromStartOfWeek($numberOfDays, $weekStartsAt);

        return $this;
    }

    public function setUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface
    {
        $this->carbon->setUnitNoOverflow($valueUnit, $value, $overflowUnit);

        return $this;
    }

    public function addUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface
    {
        $this->carbon->addUnitNoOverflow($valueUnit, $value, $overflowUnit);

        return $this;
    }

    public function subUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface
    {
        $this->carbon->subUnitNoOverflow($valueUnit, $value, $overflowUnit);

        return $this;
    }

    public function utcOffset($minuteOffset = null): DateTimeInterface
    {
        $this->carbon->utcOffset($minuteOffset);

        return $this;
    }

    public function setDate(int $year, int $month, int $day): DateTimeInterface
    {
        $this->carbon->setDate($year, $month, $day);

        return $this;
    }

    public function setISODate(int $year, int $week, int $day = 1): DateTimeInterface
    {
        $this->carbon->setISODate($year, $week, $day);

        return $this;
    }

    public function setDateTime(int $year, int $month, int $day, int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface
    {
        $this->carbon->setDateTime($year, $month, $day, $hour, $minute, $second, $microseconds);

        return $this;
    }

    public function setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface
    {
        $this->carbon->setTime($hour, $minute, $second, $microseconds);

        return $this;
    }

    public function setTimestamp($unixTimestamp): DateTimeInterface
    {
        $this->carbon->setTimestamp($unixTimestamp);

        return $this;
    }

    public function setTimeFromTimeString(string $time): DateTimeInterface
    {
        $this->carbon->setTimeFromTimeString($time);

        return $this;
    }

    public function shiftTimezone($value): DateTimeInterface
    {
        $this->carbon->shiftTimezone($value);

        return $this;
    }

    public function setDateFrom($date = null): DateTimeInterface
    {
        $this->carbon->setDateFrom($date);

        return $this;
    }

    public function setTimeFrom($date = null): DateTimeInterface
    {
        $this->carbon->setTimeFrom($date);

        return $this;
    }

    public function setDateTimeFrom($date = null): DateTimeInterface
    {
        $this->carbon->setDateTimeFrom($date);

        return $this;
    }

    public function getDays(): array
    {
        return $this->carbon
            ::getDays();
    }


    public function getWeekStartsAt(): int
    {
        return $this->carbon
            ::getWeekStartsAt();
    }

    public function getWeekEndsAt(): int
    {
        return $this->carbon
            ::getWeekEndsAt();
    }

    public function getWeekendDays(): array
    {
        return $this->carbon
            ::getWeekendDays();
    }

    public function hasRelativeKeywords(string $time): BoolEnum
    {
        $hasRelativeKeywords = $this->carbon
            ::hasRelativeKeywords($time);

        return BoolEnum::fromBool($hasRelativeKeywords);
    }

    public function getIsoFormats($locale = null): array
    {
        return $this->carbon
            ->getIsoFormats($locale);
    }

    public function getCalendarFormats($locale = null): array
    {
        return $this->carbon
            ->getCalendarFormats($locale);
    }

    /**
     * @return array|null
     */
    public function getIsoUnits()
    {
        return $this->carbon
            ::getIsoUnits();
    }

    public function getPaddedUnit(string $unit, int $length = 2, string $padString = '0', int $padType = STR_PAD_LEFT): string
    {
        return $this->carbon
            ->getPaddedUnit($unit, $length, $padString, $padType);
    }

    public function ordinal(string $key, $period = null): string
    {
        return $this->carbon
            ->ordinal($key, $period);
    }

    public function getAltNumber(string $key): string
    {
        return $this->carbon
            ->getAltNumber($key);
    }

    public function isoFormat(string $format, $originalFormat = null): string
    {
        return $this->carbon
            ->isoFormat($format, $originalFormat);
    }

    /**
     * @return array|null
     */
    public function getFormatsToIsoReplacements()
    {
        return $this->carbon
            ::getFormatsToIsoReplacements();
    }

    public function translatedFormat(string $format): string
    {
        return $this->carbon
            ->translatedFormat($format);
    }

    public function getOffsetString(string $separator = ':'): string
    {
        return $this->carbon
            ->getOffsetString($separator);
    }

    public function executeStaticCallable($macro, ...$parameters)
    {
        return $this->carbon
            ::executeStaticCallable($macro, ...$parameters);
    }

    public function setUnit(string $unit, $value = null): DateTimeInterface
    {
        $this->carbon->setUnit($unit, $value);

        return $this;
    }

    public function singularUnit(string $unit): string
    {
        return $this->carbon
            ::singularUnit($unit);
    }

    public function pluralUnit(string $unit): string
    {
        return $this->carbon
            ::pluralUnit($unit);
    }

    public function executeCallable($macro, ...$parameters)
    {
        return $this->carbon
            ->executeCallable($macro, ...$parameters);
    }

    public function executeCallableWithContext($macro, ...$parameters)
    {
        return $this->carbon
            ->executeCallableWithContext($macro, ...$parameters);
    }

    public function getGenericMacros(): \Generator
    {
        return $this->carbon::getGenericMacros();
    }

    public function diff(\DateTimeInterface $targetObject, $absolute = false)
    {
        return $this->carbon->diff($targetObject, $absolute);
    }

    public function format($format): string
    {
        return $this->carbon->format($format);
    }

    public function getOffset()
    {
        return $this->carbon->getOffset();
    }

    public function getTimestamp()
    {
        return $this->carbon->getTimestamp();
    }

    public function getTimezone()
    {
        return $this->carbon->getTimezone();
    }

    /**
     * @throws \Throwable
     */
    public function __wakeup()
    {
        $this->carbon->__wakeup();
    }
}
