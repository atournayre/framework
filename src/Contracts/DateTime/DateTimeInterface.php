<?php

declare(strict_types=1);

namespace Atournayre\Contracts\DateTime;

use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Primitives\BoolEnum;

interface DateTimeInterface extends NullableInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isAM(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isBefore(\DateTimeInterface $datetime): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isAfter(\DateTimeInterface $datetime): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isNotBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isBeforeOrEqual(\DateTimeInterface $datetime): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isAfterOrEqual(\DateTimeInterface $datetime): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isBetweenOrEqual(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isPM(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSame(\DateTimeInterface $datetime): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameOrAfter(\DateTimeInterface $datetime): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameOrBefore(\DateTimeInterface $datetime): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameOrBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isWeekday(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isWeekend(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toDateTime(): \DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function year(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function yearIso(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function month(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function day(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function hour(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function minute(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function second(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function micro(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function microsecond(): int;

    /**
     * @return float|int|string
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function timestamp();

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function englishDayOfWeek(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shortEnglishDayOfWeek(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function englishMonth(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shortEnglishMonth(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function milliseconds(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function millisecond(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function milli(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function week(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isoWeek(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function weekYear(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isoWeekYear(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function dayOfYear(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function age(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function offset(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function offsetMinutes(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function offsetHours(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function dayOfWeek(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function dayOfWeekIso(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function weekOfYear(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function daysInMonth(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function latinMeridiem(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function latinUpperMeridiem(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function timezoneAbbreviatedName(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function tzAbbrName(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function dayName(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shortDayName(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function minDayName(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function monthName(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shortMonthName(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function meridiem(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function upperMeridiem(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function noZeroHour(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function weeksInYear(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isoWeeksInYear(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function weekOfMonth(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function weekNumberInMonth(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function firstWeekDay(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function lastWeekDay(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function daysInYear(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function quarter(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function decade(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function century(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function millennium(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isDst(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isLocal(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isUtc(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function timezoneName(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function tzName(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function locale(): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isValid(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSunday(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isMonday(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isTuesday(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isWednesday(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isThursday(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isFriday(): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSaturday(): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameYear($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameWeek($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameDay($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameHour($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameMinute($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameSecond($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameMicro($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameMicrosecond($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameDecade($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameCentury($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isSameMillennium($date = null): BoolEnum;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function years(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setYears(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setYear(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function months(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMonths(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMonth(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setDays(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setDay(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function hours(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setHours(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setHour(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function minutes(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMinutes(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMinute(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function seconds(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setSeconds(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setSecond(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function millis(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMillis(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMilli(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMilliseconds(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMillisecond(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function micros(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMicros(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMicro(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function microseconds(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMicroseconds(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setMicrosecond(int $value): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYears(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYear(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYears(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYear(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYearsWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYearWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYearsWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYearWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYearsWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYearWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYearsWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYearWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYearsWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYearWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYearsWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYearWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYearsNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addYearNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYearsNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subYearNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonths(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonth(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonths(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonth(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonthsWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonthWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonthsWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonthWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonthsWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonthWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonthsWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonthWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonthsWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonthWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonthsWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonthWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonthsNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMonthNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonthsNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMonthNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDays(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDay(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDays(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDay(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addHours(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addHour(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subHours(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subHour(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMinutes(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMinute(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMinutes(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMinute(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addSeconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addSecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subSeconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subSecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillis(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMilli(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillis(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMilli(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMilliseconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillisecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMilliseconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillisecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMicros(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMicro(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMicros(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMicro(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMicroseconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMicrosecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMicroseconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMicrosecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillennia(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillennium(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillennia(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillennium(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillenniaWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillenniumWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillenniaWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillenniumWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillenniaWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillenniumWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillenniaWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillenniumWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillenniaWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillenniumWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillenniaWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillenniumWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillenniaNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addMillenniumNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillenniaNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subMillenniumNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCenturies(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCentury(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCenturies(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCentury(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCenturiesWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCenturyWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCenturiesWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCenturyWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCenturiesWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCenturyWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCenturiesWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCenturyWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCenturiesWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCenturyWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCenturiesWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCenturyWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCenturiesNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addCenturyNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCenturiesNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subCenturyNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecades(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecade(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecades(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecade(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecadesWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecadeWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecadesWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecadeWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecadesWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecadeWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecadesWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecadeWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecadesWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecadeWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecadesWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecadeWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecadesNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addDecadeNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecadesNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subDecadeNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuarters(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuarter(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuarters(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuarter(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuartersWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuarterWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuartersWithOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuarterWithOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuartersWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuarterWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuartersWithoutOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuarterWithoutOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuartersWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuarterWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuartersWithNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuarterWithNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuartersNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addQuarterNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuartersNoOverflow(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subQuarterNoOverflow(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addWeeks(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addWeek(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subWeeks(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subWeek(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addWeekdays(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addWeekday(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subWeekdays(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subWeekday(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMicros(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMicro(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMicros(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMicro(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMicroseconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMicrosecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMicroseconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMicrosecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMillis(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMilli(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMillis(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMilli(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMilliseconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMillisecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMilliseconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMillisecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealSeconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealSecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealSeconds(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealSecond(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMinutes(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMinute(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMinutes(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMinute(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealHours(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealHour(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealHours(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealHour(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealDays(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealDay(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealDays(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealDay(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealWeeks(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealWeek(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealWeeks(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealWeek(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMonths(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMonth(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMonths(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMonth(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealQuarters(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealQuarter(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealQuarters(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealQuarter(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealYears(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealYear(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealYears(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealYear(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealDecades(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealDecade(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealDecades(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealDecade(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealCenturies(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealCentury(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealCenturies(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealCentury(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMillennia(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addRealMillennium(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMillennia(int $value = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subRealMillennium(): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundYear($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundYears($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorYear($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorYears($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilYear($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilYears($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMonth($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMonths($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMonth($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMonths($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMonth($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMonths($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundDay($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundDays($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorDay($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorDays($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilDay($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilDays($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundHour($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundHours($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorHour($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorHours($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilHour($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilHours($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMinute($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMinutes($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMinute($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMinutes($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMinute($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMinutes($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundSecond($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundSeconds($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorSecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorSeconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilSecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilSeconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMillennium($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMillennia($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMillennium($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMillennia($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMillennium($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMillennia($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundCentury($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundCenturies($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorCentury($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorCenturies($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilCentury($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilCenturies($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundDecade($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundDecades($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorDecade($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorDecades($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilDecade($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilDecades($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundQuarter($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundQuarters($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorQuarter($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorQuarters($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilQuarter($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilQuarters($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMillisecond($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMilliseconds($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMillisecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMilliseconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMillisecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMilliseconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMicrosecond($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function roundMicroseconds($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMicrosecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function floorMicroseconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMicrosecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ceilMicroseconds($precision = 1): DateTimeInterface;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shortAbsoluteDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function longAbsoluteDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shortRelativeDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function longRelativeDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shortRelativeToNowDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function longRelativeToNowDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shortRelativeToOtherDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function longRelativeToOtherDiffForHumans($other = null, int $parts = 1): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function copy(): DateTimeInterface;

    public function clone(): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function nowWithSameTz(): DateTimeInterface;

    /**
     * @return bool|\DateTimeZone|float|int|string|null
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function get(string $name);

    /**
     * @param array<array-key, mixed>|string $name
     * @param \DateTimeZone|int|string|null  $value
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function set($name, $value = null): DateTimeInterface;

    /**
     * @param string|null $context
     * @param string|null $defaultValue
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getTranslatedDayName($context = null, string $keySuffix = '', $defaultValue = null): string;

    /**
     * @param string|null $context
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getTranslatedShortDayName($context = null): string;

    /**
     * @param string|null $context
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getTranslatedMinDayName($context = null): string;

    /**
     * @param string|null $context
     * @param string|null $defaultValue
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getTranslatedMonthName($context = null, string $keySuffix = '', $defaultValue = null): string;

    /**
     * @param string|null $context
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getTranslatedShortMonthName($context = null): string;

    /**
     * @param int|null $value
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function weekday($value = null): int;

    /**
     * @param int|null $value
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isoWeekday($value = null): int;

    /**
     * @param int|null $weekStartsAt
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getDaysFromStartOfWeek($weekStartsAt = null): int;

    /**
     * @param int|null $weekStartsAt
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setDaysFromStartOfWeek(int $numberOfDays, $weekStartsAt = null): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function addUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function subUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface;

    /**
     * @param int|null $minuteOffset
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function utcOffset($minuteOffset = null): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setDate(int $year, int $month, int $day): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setISODate(int $year, int $week, int $day = 1): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setDateTime(int $year, int $month, int $day, int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface;

    /**
     * @param float|int|string $unixTimestamp
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setTimestamp($unixTimestamp): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setTimeFromTimeString(string $time): DateTimeInterface;

    /**
     * @param \DateTimeZone|string $value
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setTimezone($value): DateTimeInterface;

    /**
     * @param \DateTimeZone|string $value
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shiftTimezone($value): DateTimeInterface;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setDateFrom($date = null): DateTimeInterface;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setTimeFrom($date = null): DateTimeInterface;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $date
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setDateTimeFrom($date = null): DateTimeInterface;

    /**
     * @return array<int, string>
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getDays(): array;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getWeekStartsAt(): int;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getWeekEndsAt(): int;

    /**
     * @return array<int>
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getWeekendDays(): array;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function hasRelativeKeywords(string $time): BoolEnum;

    /**
     * @param string|null $locale
     *
     * @return array<string, string>
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getIsoFormats($locale = null): array;

    /**
     * @param string|null $locale
     *
     * @return array<string, string|array<array<string|int>>>
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getCalendarFormats($locale = null): array;

    /**
     * @return array<string, string|array<array<string|int>>>|null
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getIsoUnits();

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getPaddedUnit(string $unit, int $length = 2, string $padString = '0', int $padType = STR_PAD_LEFT): string;

    /**
     * @param string|null $period
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ordinal(string $key, $period = null): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getAltNumber(string $key): string;

    /**
     * @param string|null $originalFormat
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isoFormat(string $format, $originalFormat = null): string;

    /**
     * @return array<string, bool|string>|null
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getFormatsToIsoReplacements();

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function translatedFormat(string $format): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function getOffsetString(string $separator = ':'): string;

    /**
     * @param int|null $value
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function setUnit(string $unit, $value = null): DateTimeInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function singularUnit(string $unit): string;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function pluralUnit(string $unit): string;

    /**
     * @param DateTimeInterface|string $value
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function numberOfDaysIsLowerThanOrEquals($value, int $numberOfDays): BoolEnum;
}
