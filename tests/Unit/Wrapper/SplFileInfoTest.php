<?php

declare(strict_types=1);

namespace Atournayre\Tests\Wrapper;

use Atournayre\Wrapper\SplFileInfo;
use PHPUnit\Framework\TestCase;

final class SplFileInfoTest extends TestCase
{
    public function testToLogReturnsArrayWithFilenameKey(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertArrayHasKey('filename', $result, 'toLog() must contain filename key');
    }

    public function testToLogReturnsArrayWithExtensionKey(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertArrayHasKey('extension', $result, 'toLog() must contain extension key');
    }

    public function testToLogReturnsArrayWithSizeKey(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertArrayHasKey('size', $result, 'toLog() must contain size key');
    }

    public function testToLogReturnsArrayWithRelativePathKey(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertArrayHasKey('relativePath', $result, 'toLog() must contain relativePath key');
    }

    public function testToLogReturnsArrayWithRelativePathnameKey(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertArrayHasKey('relativePathname', $result, 'toLog() must contain relativePathname key');
    }

    public function testToLogFilenameIsString(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertIsString($result['filename'], 'filename must be a string');
    }

    public function testToLogExtensionIsString(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertIsString($result['extension'], 'extension must be a string');
    }

    public function testToLogSizeIsString(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertIsString($result['size'], 'size must be a string');
    }

    public function testToLogRelativePathIsString(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertIsString($result['relativePath'], 'relativePath must be a string');
    }

    public function testToLogRelativePathnameIsString(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertIsString($result['relativePathname'], 'relativePathname must be a string');
    }

    public function testToLogFilenameMatchesActualFilename(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertEquals('SplFileInfoTest.php', $result['filename'], 'filename must match actual filename');
    }

    public function testToLogExtensionMatchesActualExtension(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertEquals('php', $result['extension'], 'extension must match php');
    }

    public function testToLogSizeContainsUnit(): void
    {
        $file = SplFileInfo::of(__FILE__, '', '');
        $result = $file->toLog();
        self::assertMatchesRegularExpression('/\d+(\.\d+)?\s*(B|KB|MB|GB)/', $result['size'], 'size must contain unit');
    }
}
