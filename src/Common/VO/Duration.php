<?php

declare(strict_types=1);

namespace Atournayre\Common\VO;

use Atournayre\Primitives\Collection;

final class Duration
{
    private const MILLISECONDS_IN_SECOND = 1000;

    private const SECONDS_IN_MINUTE = 60;

    private const MINUTES_IN_HOUR = 60;

    private const HOURS_IN_DAY = 24;

    private int $milliseconds;

    private function __construct(int $milliseconds)
    {
        $this->milliseconds = $milliseconds;
    }

    /**
     * @api
     */
    public static function of(int $milliseconds): self
    {
        return new self($milliseconds);
    }

    /**
     * @api
     */
    public function asIs(): int
    {
        return $this->milliseconds;
    }

    /**
     * @api
     */
    public function milliseconds(): int
    {
        return $this->milliseconds;
    }

    /**
     * @api
     */
    public function inSeconds(): float
    {
        return $this->milliseconds / self::MILLISECONDS_IN_SECOND;
    }

    /**
     * @api
     */
    public function inMinutes(): float
    {
        return $this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE;
    }

    /**
     * @api
     */
    public function inHours(): float
    {
        return $this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE / self::MINUTES_IN_HOUR;
    }

    /**
     * @api
     */
    public function inDays(): float
    {
        return $this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE / self::MINUTES_IN_HOUR / self::HOURS_IN_DAY;
    }

    /**
     * @api
     */
    public function forHumanReading(string $glue = ' '): string
    {
        $days = floor($this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE / self::MINUTES_IN_HOUR / self::HOURS_IN_DAY);
        $hours = floor($this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE / self::MINUTES_IN_HOUR) % self::HOURS_IN_DAY;
        $minutes = floor($this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE) % self::MINUTES_IN_HOUR;
        $seconds = floor($this->milliseconds / self::MILLISECONDS_IN_SECOND) % self::SECONDS_IN_MINUTE;
        $milliseconds = $this->milliseconds % self::MILLISECONDS_IN_SECOND;

        $pushCallback = fn ($value): bool => $value >= 0;
        $pluralCallback = fn ($value, $singular, $plural): string => $value <= 1 ? $singular : $plural;

        return Collection::of()
            ->push($days, $pushCallback)
            ->push($pluralCallback($days, 'day', 'days').$glue, $pushCallback)
            ->push($hours, $pushCallback)
            ->push($pluralCallback($hours, 'hour', 'hours').$glue, $pushCallback)
            ->push($minutes, $pushCallback)
            ->push($pluralCallback($minutes, 'minute', 'minutes').$glue, $pushCallback)
            ->push($seconds, $pushCallback)
            ->push($pluralCallback($seconds, 'second', 'seconds').$glue, $pushCallback)
            ->push($milliseconds, $pushCallback)
            ->push($pluralCallback($milliseconds, 'millisecond', 'milliseconds'), $pushCallback)
            ->join(' ')
        ;
    }
}
