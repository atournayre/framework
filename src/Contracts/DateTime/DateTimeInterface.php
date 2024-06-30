<?php

declare(strict_types=1);

namespace Atournayre\Contracts\DateTime;

use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Primitives\BoolEnum;

interface DateTimeInterface extends NullableInterface
{
    public function isAM(): BoolEnum;

    public function isBefore(\DateTimeInterface $datetime): BoolEnum;

    public function isAfter(\DateTimeInterface $datetime): BoolEnum;

    public function isBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum;

    public function isNotBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum;

    public function isBeforeOrEqual(\DateTimeInterface $datetime): BoolEnum;

    public function isAfterOrEqual(\DateTimeInterface $datetime): BoolEnum;

    public function isBetweenOrEqual(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum;

    public function isPM(): BoolEnum;

    public function isSame(\DateTimeInterface $datetime): BoolEnum;

    public function isSameOrAfter(\DateTimeInterface $datetime): BoolEnum;

    public function isSameOrBefore(\DateTimeInterface $datetime): BoolEnum;

    public function isSameOrBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): BoolEnum;

    public function isWeekday(): BoolEnum;

    public function isWeekend(): BoolEnum;

    public function toDateTime(): \DateTimeInterface;

    public function year(): int;

    public function yearIso(): int;

    public function month(): int;

    public function day(): int;

    public function hour(): int;

    public function minute(): int;

    public function second(): int;

    public function micro(): int;

    public function microsecond(): int;

    /**
     * @return float|int|string
     */
    public function timestamp();

    public function englishDayOfWeek(): string;

    public function shortEnglishDayOfWeek(): string;

    public function englishMonth(): string;

    public function shortEnglishMonth(): string;

    public function milliseconds(): int;

    public function millisecond(): int;

    public function milli(): int;

    public function week(): int;

    public function isoWeek(): int;

    public function weekYear(): int;

    public function isoWeekYear(): int;

    public function dayOfYear(): int;

    public function age(): int;

    public function offset(): int;

    public function offsetMinutes(): int;

    public function offsetHours(): int;

    public function dayOfWeek(): int;

    public function dayOfWeekIso(): int;

    public function weekOfYear(): int;

    public function daysInMonth(): int;

    public function latinMeridiem(): string;

    public function latinUpperMeridiem(): string;

    public function timezoneAbbreviatedName(): string;

    public function tzAbbrName(): string;

    public function dayName(): string;

    public function shortDayName(): string;

    public function minDayName(): string;

    public function monthName(): string;

    public function shortMonthName(): string;

    public function meridiem(): string;

    public function upperMeridiem(): string;

    public function noZeroHour(): int;

    public function weeksInYear(): int;

    public function isoWeeksInYear(): int;

    public function weekOfMonth(): int;

    public function weekNumberInMonth(): int;

    public function firstWeekDay(): int;

    public function lastWeekDay(): int;

    public function daysInYear(): int;

    public function quarter(): int;

    public function decade(): int;

    public function century(): int;

    public function millennium(): int;

    public function isDst(): BoolEnum;

    public function isLocal(): BoolEnum;

    public function isUtc(): BoolEnum;

    public function timezoneName(): string;

    public function tzName(): string;

    public function locale(): string;

    public function isValid(): BoolEnum;

    public function isSunday(): BoolEnum;

    public function isMonday(): BoolEnum;

    public function isTuesday(): BoolEnum;

    public function isWednesday(): BoolEnum;

    public function isThursday(): BoolEnum;

    public function isFriday(): BoolEnum;

    public function isSaturday(): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameYear($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameWeek($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameDay($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameHour($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameMinute($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameSecond($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameMicro($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameMicrosecond($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameDecade($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameCentury($date = null): BoolEnum;

    /**
     * @param DateTimeInterface|string|null $date
     */
    public function isSameMillennium($date = null): BoolEnum;

    public function years(int $value): DateTimeInterface;

    public function setYears(int $value): DateTimeInterface;

    public function setYear(int $value): DateTimeInterface;

    public function months(int $value): DateTimeInterface;

    public function setMonths(int $value): DateTimeInterface;

    public function setMonth(int $value): DateTimeInterface;

    public function setDays(int $value): DateTimeInterface;

    public function setDay(int $value): DateTimeInterface;

    public function hours(int $value): DateTimeInterface;

    public function setHours(int $value): DateTimeInterface;

    public function setHour(int $value): DateTimeInterface;

    public function minutes(int $value): DateTimeInterface;

    public function setMinutes(int $value): DateTimeInterface;

    public function setMinute(int $value): DateTimeInterface;

    public function seconds(int $value): DateTimeInterface;

    public function setSeconds(int $value): DateTimeInterface;

    public function setSecond(int $value): DateTimeInterface;

    public function millis(int $value): DateTimeInterface;

    public function setMillis(int $value): DateTimeInterface;

    public function setMilli(int $value): DateTimeInterface;

    public function setMilliseconds(int $value): DateTimeInterface;

    public function setMillisecond(int $value): DateTimeInterface;

    public function micros(int $value): DateTimeInterface;

    public function setMicros(int $value): DateTimeInterface;

    public function setMicro(int $value): DateTimeInterface;

    public function microseconds(int $value): DateTimeInterface;

    public function setMicroseconds(int $value): DateTimeInterface;

    public function setMicrosecond(int $value): DateTimeInterface;

    public function addYears(int $value = 1): DateTimeInterface;

    public function addYear(): DateTimeInterface;

    public function subYears(int $value = 1): DateTimeInterface;

    public function subYear(): DateTimeInterface;

    public function addYearsWithOverflow(int $value = 1): DateTimeInterface;

    public function addYearWithOverflow(): DateTimeInterface;

    public function subYearsWithOverflow(int $value = 1): DateTimeInterface;

    public function subYearWithOverflow(): DateTimeInterface;

    public function addYearsWithoutOverflow(int $value = 1): DateTimeInterface;

    public function addYearWithoutOverflow(): DateTimeInterface;

    public function subYearsWithoutOverflow(int $value = 1): DateTimeInterface;

    public function subYearWithoutOverflow(): DateTimeInterface;

    public function addYearsWithNoOverflow(int $value = 1): DateTimeInterface;

    public function addYearWithNoOverflow(): DateTimeInterface;

    public function subYearsWithNoOverflow(int $value = 1): DateTimeInterface;

    public function subYearWithNoOverflow(): DateTimeInterface;

    public function addYearsNoOverflow(int $value = 1): DateTimeInterface;

    public function addYearNoOverflow(): DateTimeInterface;

    public function subYearsNoOverflow(int $value = 1): DateTimeInterface;

    public function subYearNoOverflow(): DateTimeInterface;

    public function addMonths(int $value = 1): DateTimeInterface;

    public function addMonth(): DateTimeInterface;

    public function subMonths(int $value = 1): DateTimeInterface;

    public function subMonth(): DateTimeInterface;

    public function addMonthsWithOverflow(int $value = 1): DateTimeInterface;

    public function addMonthWithOverflow(): DateTimeInterface;

    public function subMonthsWithOverflow(int $value = 1): DateTimeInterface;

    public function subMonthWithOverflow(): DateTimeInterface;

    public function addMonthsWithoutOverflow(int $value = 1): DateTimeInterface;

    public function addMonthWithoutOverflow(): DateTimeInterface;

    public function subMonthsWithoutOverflow(int $value = 1): DateTimeInterface;

    public function subMonthWithoutOverflow(): DateTimeInterface;

    public function addMonthsWithNoOverflow(int $value = 1): DateTimeInterface;

    public function addMonthWithNoOverflow(): DateTimeInterface;

    public function subMonthsWithNoOverflow(int $value = 1): DateTimeInterface;

    public function subMonthWithNoOverflow(): DateTimeInterface;

    public function addMonthsNoOverflow(int $value = 1): DateTimeInterface;

    public function addMonthNoOverflow(): DateTimeInterface;

    public function subMonthsNoOverflow(int $value = 1): DateTimeInterface;

    public function subMonthNoOverflow(): DateTimeInterface;

    public function addDays(int $value = 1): DateTimeInterface;

    public function addDay(): DateTimeInterface;

    public function subDays(int $value = 1): DateTimeInterface;

    public function subDay(): DateTimeInterface;

    public function addHours(int $value = 1): DateTimeInterface;

    public function addHour(): DateTimeInterface;

    public function subHours(int $value = 1): DateTimeInterface;

    public function subHour(): DateTimeInterface;

    public function addMinutes(int $value = 1): DateTimeInterface;

    public function addMinute(): DateTimeInterface;

    public function subMinutes(int $value = 1): DateTimeInterface;

    public function subMinute(): DateTimeInterface;

    public function addSeconds(int $value = 1): DateTimeInterface;

    public function addSecond(): DateTimeInterface;

    public function subSeconds(int $value = 1): DateTimeInterface;

    public function subSecond(): DateTimeInterface;

    public function addMillis(int $value = 1): DateTimeInterface;

    public function addMilli(): DateTimeInterface;

    public function subMillis(int $value = 1): DateTimeInterface;

    public function subMilli(): DateTimeInterface;

    public function addMilliseconds(int $value = 1): DateTimeInterface;

    public function addMillisecond(): DateTimeInterface;

    public function subMilliseconds(int $value = 1): DateTimeInterface;

    public function subMillisecond(): DateTimeInterface;

    public function addMicros(int $value = 1): DateTimeInterface;

    public function addMicro(): DateTimeInterface;

    public function subMicros(int $value = 1): DateTimeInterface;

    public function subMicro(): DateTimeInterface;

    public function addMicroseconds(int $value = 1): DateTimeInterface;

    public function addMicrosecond(): DateTimeInterface;

    public function subMicroseconds(int $value = 1): DateTimeInterface;

    public function subMicrosecond(): DateTimeInterface;

    public function addMillennia(int $value = 1): DateTimeInterface;

    public function addMillennium(): DateTimeInterface;

    public function subMillennia(int $value = 1): DateTimeInterface;

    public function subMillennium(): DateTimeInterface;

    public function addMillenniaWithOverflow(int $value = 1): DateTimeInterface;

    public function addMillenniumWithOverflow(): DateTimeInterface;

    public function subMillenniaWithOverflow(int $value = 1): DateTimeInterface;

    public function subMillenniumWithOverflow(): DateTimeInterface;

    public function addMillenniaWithoutOverflow(int $value = 1): DateTimeInterface;

    public function addMillenniumWithoutOverflow(): DateTimeInterface;

    public function subMillenniaWithoutOverflow(int $value = 1): DateTimeInterface;

    public function subMillenniumWithoutOverflow(): DateTimeInterface;

    public function addMillenniaWithNoOverflow(int $value = 1): DateTimeInterface;

    public function addMillenniumWithNoOverflow(): DateTimeInterface;

    public function subMillenniaWithNoOverflow(int $value = 1): DateTimeInterface;

    public function subMillenniumWithNoOverflow(): DateTimeInterface;

    public function addMillenniaNoOverflow(int $value = 1): DateTimeInterface;

    public function addMillenniumNoOverflow(): DateTimeInterface;

    public function subMillenniaNoOverflow(int $value = 1): DateTimeInterface;

    public function subMillenniumNoOverflow(): DateTimeInterface;

    public function addCenturies(int $value = 1): DateTimeInterface;

    public function addCentury(): DateTimeInterface;

    public function subCenturies(int $value = 1): DateTimeInterface;

    public function subCentury(): DateTimeInterface;

    public function addCenturiesWithOverflow(int $value = 1): DateTimeInterface;

    public function addCenturyWithOverflow(): DateTimeInterface;

    public function subCenturiesWithOverflow(int $value = 1): DateTimeInterface;

    public function subCenturyWithOverflow(): DateTimeInterface;

    public function addCenturiesWithoutOverflow(int $value = 1): DateTimeInterface;

    public function addCenturyWithoutOverflow(): DateTimeInterface;

    public function subCenturiesWithoutOverflow(int $value = 1): DateTimeInterface;

    public function subCenturyWithoutOverflow(): DateTimeInterface;

    public function addCenturiesWithNoOverflow(int $value = 1): DateTimeInterface;

    public function addCenturyWithNoOverflow(): DateTimeInterface;

    public function subCenturiesWithNoOverflow(int $value = 1): DateTimeInterface;

    public function subCenturyWithNoOverflow(): DateTimeInterface;

    public function addCenturiesNoOverflow(int $value = 1): DateTimeInterface;

    public function addCenturyNoOverflow(): DateTimeInterface;

    public function subCenturiesNoOverflow(int $value = 1): DateTimeInterface;

    public function subCenturyNoOverflow(): DateTimeInterface;

    public function addDecades(int $value = 1): DateTimeInterface;

    public function addDecade(): DateTimeInterface;

    public function subDecades(int $value = 1): DateTimeInterface;

    public function subDecade(): DateTimeInterface;

    public function addDecadesWithOverflow(int $value = 1): DateTimeInterface;

    public function addDecadeWithOverflow(): DateTimeInterface;

    public function subDecadesWithOverflow(int $value = 1): DateTimeInterface;

    public function subDecadeWithOverflow(): DateTimeInterface;

    public function addDecadesWithoutOverflow(int $value = 1): DateTimeInterface;

    public function addDecadeWithoutOverflow(): DateTimeInterface;

    public function subDecadesWithoutOverflow(int $value = 1): DateTimeInterface;

    public function subDecadeWithoutOverflow(): DateTimeInterface;

    public function addDecadesWithNoOverflow(int $value = 1): DateTimeInterface;

    public function addDecadeWithNoOverflow(): DateTimeInterface;

    public function subDecadesWithNoOverflow(int $value = 1): DateTimeInterface;

    public function subDecadeWithNoOverflow(): DateTimeInterface;

    public function addDecadesNoOverflow(int $value = 1): DateTimeInterface;

    public function addDecadeNoOverflow(): DateTimeInterface;

    public function subDecadesNoOverflow(int $value = 1): DateTimeInterface;

    public function subDecadeNoOverflow(): DateTimeInterface;

    public function addQuarters(int $value = 1): DateTimeInterface;

    public function addQuarter(): DateTimeInterface;

    public function subQuarters(int $value = 1): DateTimeInterface;

    public function subQuarter(): DateTimeInterface;

    public function addQuartersWithOverflow(int $value = 1): DateTimeInterface;

    public function addQuarterWithOverflow(): DateTimeInterface;

    public function subQuartersWithOverflow(int $value = 1): DateTimeInterface;

    public function subQuarterWithOverflow(): DateTimeInterface;

    public function addQuartersWithoutOverflow(int $value = 1): DateTimeInterface;

    public function addQuarterWithoutOverflow(): DateTimeInterface;

    public function subQuartersWithoutOverflow(int $value = 1): DateTimeInterface;

    public function subQuarterWithoutOverflow(): DateTimeInterface;

    public function addQuartersWithNoOverflow(int $value = 1): DateTimeInterface;

    public function addQuarterWithNoOverflow(): DateTimeInterface;

    public function subQuartersWithNoOverflow(int $value = 1): DateTimeInterface;

    public function subQuarterWithNoOverflow(): DateTimeInterface;

    public function addQuartersNoOverflow(int $value = 1): DateTimeInterface;

    public function addQuarterNoOverflow(): DateTimeInterface;

    public function subQuartersNoOverflow(int $value = 1): DateTimeInterface;

    public function subQuarterNoOverflow(): DateTimeInterface;

    public function addWeeks(int $value = 1): DateTimeInterface;

    public function addWeek(): DateTimeInterface;

    public function subWeeks(int $value = 1): DateTimeInterface;

    public function subWeek(): DateTimeInterface;

    public function addWeekdays(int $value = 1): DateTimeInterface;

    public function addWeekday(): DateTimeInterface;

    public function subWeekdays(int $value = 1): DateTimeInterface;

    public function subWeekday(): DateTimeInterface;

    public function addRealMicros(int $value = 1): DateTimeInterface;

    public function addRealMicro(): DateTimeInterface;

    public function subRealMicros(int $value = 1): DateTimeInterface;

    public function subRealMicro(): DateTimeInterface;

    public function addRealMicroseconds(int $value = 1): DateTimeInterface;

    public function addRealMicrosecond(): DateTimeInterface;

    public function subRealMicroseconds(int $value = 1): DateTimeInterface;

    public function subRealMicrosecond(): DateTimeInterface;

    public function addRealMillis(int $value = 1): DateTimeInterface;

    public function addRealMilli(): DateTimeInterface;

    public function subRealMillis(int $value = 1): DateTimeInterface;

    public function subRealMilli(): DateTimeInterface;

    public function addRealMilliseconds(int $value = 1): DateTimeInterface;

    public function addRealMillisecond(): DateTimeInterface;

    public function subRealMilliseconds(int $value = 1): DateTimeInterface;

    public function subRealMillisecond(): DateTimeInterface;

    public function addRealSeconds(int $value = 1): DateTimeInterface;

    public function addRealSecond(): DateTimeInterface;

    public function subRealSeconds(int $value = 1): DateTimeInterface;

    public function subRealSecond(): DateTimeInterface;

    public function addRealMinutes(int $value = 1): DateTimeInterface;

    public function addRealMinute(): DateTimeInterface;

    public function subRealMinutes(int $value = 1): DateTimeInterface;

    public function subRealMinute(): DateTimeInterface;

    public function addRealHours(int $value = 1): DateTimeInterface;

    public function addRealHour(): DateTimeInterface;

    public function subRealHours(int $value = 1): DateTimeInterface;

    public function subRealHour(): DateTimeInterface;

    public function addRealDays(int $value = 1): DateTimeInterface;

    public function addRealDay(): DateTimeInterface;

    public function subRealDays(int $value = 1): DateTimeInterface;

    public function subRealDay(): DateTimeInterface;

    public function addRealWeeks(int $value = 1): DateTimeInterface;

    public function addRealWeek(): DateTimeInterface;

    public function subRealWeeks(int $value = 1): DateTimeInterface;

    public function subRealWeek(): DateTimeInterface;

    public function addRealMonths(int $value = 1): DateTimeInterface;

    public function addRealMonth(): DateTimeInterface;

    public function subRealMonths(int $value = 1): DateTimeInterface;

    public function subRealMonth(): DateTimeInterface;

    public function addRealQuarters(int $value = 1): DateTimeInterface;

    public function addRealQuarter(): DateTimeInterface;

    public function subRealQuarters(int $value = 1): DateTimeInterface;

    public function subRealQuarter(): DateTimeInterface;

    public function addRealYears(int $value = 1): DateTimeInterface;

    public function addRealYear(): DateTimeInterface;

    public function subRealYears(int $value = 1): DateTimeInterface;

    public function subRealYear(): DateTimeInterface;

    public function addRealDecades(int $value = 1): DateTimeInterface;

    public function addRealDecade(): DateTimeInterface;

    public function subRealDecades(int $value = 1): DateTimeInterface;

    public function subRealDecade(): DateTimeInterface;

    public function addRealCenturies(int $value = 1): DateTimeInterface;

    public function addRealCentury(): DateTimeInterface;

    public function subRealCenturies(int $value = 1): DateTimeInterface;

    public function subRealCentury(): DateTimeInterface;

    public function addRealMillennia(int $value = 1): DateTimeInterface;

    public function addRealMillennium(): DateTimeInterface;

    public function subRealMillennia(int $value = 1): DateTimeInterface;

    public function subRealMillennium(): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundYear($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundYears($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorYear($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorYears($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilYear($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilYears($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMonth($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMonths($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMonth($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMonths($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMonth($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMonths($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundDay($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundDays($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorDay($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorDays($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilDay($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilDays($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundHour($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundHours($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorHour($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorHours($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilHour($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilHours($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMinute($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMinutes($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMinute($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMinutes($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMinute($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMinutes($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundSecond($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundSeconds($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorSecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorSeconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilSecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilSeconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMillennium($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMillennia($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMillennium($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMillennia($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMillennium($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMillennia($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundCentury($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundCenturies($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorCentury($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorCenturies($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilCentury($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilCenturies($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundDecade($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundDecades($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorDecade($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorDecades($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilDecade($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilDecades($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundQuarter($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundQuarters($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorQuarter($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorQuarters($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilQuarter($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilQuarters($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMillisecond($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMilliseconds($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMillisecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMilliseconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMillisecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMilliseconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMicrosecond($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function roundMicroseconds($precision = 1, string $function = 'round'): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMicrosecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function floorMicroseconds($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMicrosecond($precision = 1): DateTimeInterface;

    /**
     * @param float|int $precision
     */
    public function ceilMicroseconds($precision = 1): DateTimeInterface;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    public function shortAbsoluteDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    public function longAbsoluteDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    public function shortRelativeDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    public function longRelativeDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    public function shortRelativeToNowDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    public function longRelativeToNowDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    public function shortRelativeToOtherDiffForHumans($other = null, int $parts = 1): string;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $other
     */
    public function longRelativeToOtherDiffForHumans($other = null, int $parts = 1): string;

    public function copy(): DateTimeInterface;

    public function clone(): DateTimeInterface;

    public function nowWithSameTz(): DateTimeInterface;

    /**
     * @return bool|\DateTimeZone|float|int|string|null
     */
    public function get(string $name);

    /**
     * @param array<array-key, mixed>|string $name
     * @param \DateTimeZone|int|string|null  $value
     */
    public function set($name, $value = null): DateTimeInterface;

    /**
     * @param string|null $context
     * @param string|null $defaultValue
     */
    public function getTranslatedDayName($context = null, string $keySuffix = '', $defaultValue = null): string;

    /**
     * @param string|null $context
     */
    public function getTranslatedShortDayName($context = null): string;

    /**
     * @param string|null $context
     */
    public function getTranslatedMinDayName($context = null): string;

    /**
     * @param string|null $context
     * @param string|null $defaultValue
     */
    public function getTranslatedMonthName($context = null, string $keySuffix = '', $defaultValue = null): string;

    /**
     * @param string|null $context
     */
    public function getTranslatedShortMonthName($context = null): string;

    /**
     * @param int|null $value
     */
    public function weekday($value = null): int;

    /**
     * @param int|null $value
     */
    public function isoWeekday($value = null): int;

    /**
     * @param int|null $weekStartsAt
     */
    public function getDaysFromStartOfWeek($weekStartsAt = null): int;

    /**
     * @param int|null $weekStartsAt
     */
    public function setDaysFromStartOfWeek(int $numberOfDays, $weekStartsAt = null): DateTimeInterface;

    public function setUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface;

    public function addUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface;

    public function subUnitNoOverflow(string $valueUnit, int $value, string $overflowUnit): DateTimeInterface;

    /**
     * @param int|null $minuteOffset
     */
    public function utcOffset($minuteOffset = null): DateTimeInterface;

    public function setDate(int $year, int $month, int $day): DateTimeInterface;

    public function setISODate(int $year, int $week, int $day = 1): DateTimeInterface;

    public function setDateTime(int $year, int $month, int $day, int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface;

    public function setTime(int $hour, int $minute, int $second = 0, int $microseconds = 0): DateTimeInterface;

    /**
     * @param float|int|string $unixTimestamp
     */
    public function setTimestamp($unixTimestamp): DateTimeInterface;

    public function setTimeFromTimeString(string $time): DateTimeInterface;

    /**
     * @param \DateTimeZone|string $value
     */
    public function setTimezone($value): DateTimeInterface;

    /**
     * @param \DateTimeZone|string $value
     */
    public function shiftTimezone($value): DateTimeInterface;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $date
     */
    public function setDateFrom($date = null): DateTimeInterface;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $date
     */
    public function setTimeFrom($date = null): DateTimeInterface;

    /**
     * @param DateTimeInterface|\DateTimeInterface|null $date
     */
    public function setDateTimeFrom($date = null): DateTimeInterface;

    /**
     * @return array<int, string>
     */
    public function getDays(): array;

    public function getWeekStartsAt(): int;

    public function getWeekEndsAt(): int;

    /**
     * @return array<int>
     */
    public function getWeekendDays(): array;

    public function hasRelativeKeywords(string $time): BoolEnum;

    /**
     * @param string|null $locale
     * @return array<string, string>
     */
    public function getIsoFormats($locale = null): array;

    /**
     * @param string|null $locale
     * @return array<string, string|array<array<string|int>>>
     */
    public function getCalendarFormats($locale = null): array;

    /**
     * @return array<string, string|array<array<string|int>>>|null
     */
    public function getIsoUnits();

    public function getPaddedUnit(string $unit, int $length = 2, string $padString = '0', int $padType = STR_PAD_LEFT): string;

    /**
     * @param string|null $period
     */
    public function ordinal(string $key, $period = null): string;

    public function getAltNumber(string $key): string;

    /**
     * @param string|null $originalFormat
     */
    public function isoFormat(string $format, $originalFormat = null): string;

    /**
     * @return array<string, bool|string>|null
     */
    public function getFormatsToIsoReplacements();

    public function translatedFormat(string $format): string;

    public function getOffsetString(string $separator = ':'): string;

    /**
     * @param int|null $value
     */
    public function setUnit(string $unit, $value = null): DateTimeInterface;

    public function singularUnit(string $unit): string;

    public function pluralUnit(string $unit): string;
}
