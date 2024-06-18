<?php

declare(strict_types=1);

namespace Atournayre\Contracts\DateTime;

use Atournayre\Contracts\Null\NullableInterface;

interface DateTimeInterface extends NullableInterface
{
    public function isAM(): bool;

    public function isBefore(\DateTimeInterface $datetime): bool;

    public function isAfter(\DateTimeInterface $datetime): bool;

    public function isBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): bool;

    public function isBeforeOrEqual(\DateTimeInterface $datetime): bool;

    public function isAfterOrEqual(\DateTimeInterface $datetime): bool;

    public function isBetweenOrEqual(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): bool;

    public function isPM(): bool;

    public function isSame(\DateTimeInterface $datetime): bool;

    public function isSameOrAfter(\DateTimeInterface $datetime): bool;

    public function isSameOrBefore(\DateTimeInterface $datetime): bool;

    public function isSameOrBetween(\DateTimeInterface $datetime1, \DateTimeInterface $datetime2): bool;

    public function isWeekday(): bool;

    public function isWeekend(): bool;

    public function toDateTime(): \DateTimeInterface;
}
