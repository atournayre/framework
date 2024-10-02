<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\VO;

use Atournayre\Common\VO\Duration;
use PHPUnit\Framework\TestCase;

final class DurationTest extends TestCase
{
    /**
     * @return array<string, array<int>>
     */
    public function dataProvider(): array
    {
        $test1 = (float) 1 * 24 * 60 * 60 * 1000 // 1 day
            + 4 * 60 * 60 * 1000 // 4 hours
            + 31 * 60 * 1000 // 31 minutes
            + 12 * 1000 // 12 seconds
            + 456; // 456 milliseconds

        $test2 = 2 * 24 * 60 * 60 * 1000 // 2 days
            + 1 * 60 * 60 * 1000 // 1 hour
            + 0 * 60 * 1000 // 0 minute
            + 1 * 1000 // 1 second
            + 0; // 0 millisecond

        return [
            '1 day 4 hours 31 minutes 12 seconds 456 milliseconds' => [
                $test1,
                $test1,
                $test1 / 1000,
                $test1 / 1000 / 60,
                $test1 / 1000 / 60 / 60,
                $test1 / 1000 / 60 / 60 / 24,
                '', // glue for human reading
                '1 day 4 hours 31 minutes 12 seconds 456 milliseconds',
            ],
            '2 days 1 hour 0 minute 1 second 0 millisecond' => [
                $test2,
                $test2,
                $test2 / 1000,
                $test2 / 1000 / 60,
                $test2 / 1000 / 60 / 60,
                $test2 / 1000 / 60 / 60 / 24,
                ',', // glue for human reading
                '2 days, 1 hour, 0 minute, 1 second, 0 millisecond',
            ],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testDuration(
        float $milliseconds,
        float $expectedMilliseconds,
        float $expectedSeconds,
        float $expectedMinutes,
        float $expectedHours,
        float $expectedDays,
        string $glueForHumanReading,
        string $expectedHuman
    ): void {
        $duration = Duration::of($milliseconds);

        self::assertEquals($expectedMilliseconds, $duration->asIs());
        self::assertEquals($expectedSeconds, $duration->inSeconds());
        self::assertEquals($expectedMinutes, $duration->inMinutes());
        self::assertEquals($expectedHours, $duration->inHours());
        self::assertEquals($expectedDays, $duration->inDays());
        self::assertEquals($expectedHuman, $duration->humanReadable($glueForHumanReading));
    }
}
