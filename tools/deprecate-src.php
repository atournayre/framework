#!/usr/bin/env php
<?php

declare(strict_types=1);

const DEPRECATION_MESSAGE = 'Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework';
const DEPRECATION_ATTRIBUTE = '#[\Deprecated("' . DEPRECATION_MESSAGE . '")]';

$root = $argv[1] ?? __DIR__ . '/../src';
$rootPath = realpath($root);
if ($rootPath === false || !is_dir($rootPath)) {
    fwrite(STDERR, "Invalid src directory: {$root}\n");
    exit(1);
}

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootPath));
$updatedFiles = 0;

/** @var SplFileInfo $file */
foreach ($iterator as $file) {
    if (!$file->isFile() || $file->getExtension() !== 'php') {
        continue;
    }

    $path = $file->getPathname();
    $code = file_get_contents($path);
    if ($code === false) {
        fwrite(STDERR, "Failed to read {$path}\n");
        exit(1);
    }

    $updated = processPhpFile($code);
    if ($updated === $code) {
        continue;
    }

    file_put_contents($path, $updated);
    $updatedFiles++;
}

echo "Updated {$updatedFiles} files\n";

function processPhpFile(string $code): string
{
    $tokens = token_get_all($code);
    $count = count($tokens);

    $offsets = [];
    $cursor = 0;
    for ($i = 0; $i < $count; $i++) {
        $offsets[$i] = $cursor;
        $cursor += strlen(tokenText($tokens[$i]));
    }

    $operations = [];
    $classDepths = [];
    $pendingClass = false;
    $braceDepth = 0;

    for ($i = 0; $i < $count; $i++) {
        $token = $tokens[$i];

        if ($token === '{') {
            $braceDepth++;
            if ($pendingClass) {
                $classDepths[] = $braceDepth;
                $pendingClass = false;
            }
            continue;
        }

        if ($token === '}') {
            if (!empty($classDepths) && $classDepths[array_key_last($classDepths)] === $braceDepth) {
                array_pop($classDepths);
            }
            $braceDepth--;
            continue;
        }

        if (!is_array($token)) {
            continue;
        }

        if (in_array($token[0], [T_CLASS, T_INTERFACE, T_TRAIT, T_ENUM], true)) {
            if ($token[0] === T_CLASS && (isAnonymousClass($tokens, $i) || isClassConstantFetch($tokens, $i))) {
                continue;
            }
            addDeprecationOperations($code, $tokens, $offsets, $i, true, $operations);
            $pendingClass = true;
            continue;
        }

        if ($token[0] === T_FUNCTION && !empty($classDepths) && !isAnonymousFunction($tokens, $i)) {
            addDeprecationOperations($code, $tokens, $offsets, $i, false, $operations);
        }
    }

    if ($operations === []) {
        return $code;
    }

    usort(
        $operations,
        static fn(array $a, array $b): int => ($b['offset'] <=> $a['offset']) ?: (($a['priority'] ?? 1) <=> ($b['priority'] ?? 1))
    );

    $updated = $code;
    foreach ($operations as $operation) {
        $updated = substr_replace($updated, $operation['text'], $operation['offset'], $operation['length']);
    }

    return $updated;
}

function addDeprecationOperations(string $code, array $tokens, array $offsets, int $declIndex, bool $classLike, array &$operations): void
{
    $declStartIndex = findDeclarationStartIndex($tokens, $declIndex, $classLike);
    $declOffset = $offsets[$declStartIndex];
    $indent = detectIndent($code, $declOffset);
    $lineOffset = $declOffset - strlen($indent);

    $scan = inspectLeadingMetadata($tokens, $offsets, $declStartIndex);

    if ($scan['docIndex'] === null) {
        $docInsertOffset = $scan['firstAttributeOffset'] ?? $lineOffset;
        $operations[] = [
            'offset' => $docInsertOffset,
            'length' => 0,
            'priority' => 2,
            'text' => "{$indent}/**\n{$indent} * @deprecated " . DEPRECATION_MESSAGE . "\n{$indent} */\n",
        ];
    } elseif (!$scan['hasDeprecatedDoc']) {
        $doc = $tokens[$scan['docIndex']][1];
        $operations[] = [
            'offset' => $offsets[$scan['docIndex']],
            'length' => strlen($doc),
            'priority' => 1,
            'text' => appendDeprecatedTagToDoc($doc, $indent),
        ];
    }

    if (!$classLike && !$scan['hasDeprecatedAttribute']) {
        $operations[] = [
            'offset' => $lineOffset,
            'length' => 0,
            'priority' => 1,
            'text' => $indent . DEPRECATION_ATTRIBUTE . "\n",
        ];
    }
}

function inspectLeadingMetadata(array $tokens, array $offsets, int $declStartIndex): array
{
    $docIndex = null;
    $hasDeprecatedDoc = false;
    $hasDeprecatedAttribute = false;
    $firstAttributeOffset = null;

    for ($i = $declStartIndex - 1; $i >= 0; $i--) {
        $token = $tokens[$i];

        if (is_string($token)) {
            if (trim($token) === '') {
                continue;
            }
            break;
        }

        if (in_array($token[0], [T_WHITESPACE, T_COMMENT], true)) {
            continue;
        }

        if ($token[0] === T_DOC_COMMENT) {
            $docIndex = $i;
            $hasDeprecatedDoc = str_contains($token[1], '@deprecated');
            continue;
        }

        if ($token[0] === T_ATTRIBUTE) {
            $attrStart = findAttributeStartIndex($tokens, $i);
            $firstAttributeOffset = $offsets[$attrStart];
            if (attributeContainsDeprecated($tokens, $i)) {
                $hasDeprecatedAttribute = true;
            }
            $i = $attrStart;
            continue;
        }

        break;
    }

    return [
        'docIndex' => $docIndex,
        'hasDeprecatedDoc' => $hasDeprecatedDoc,
        'hasDeprecatedAttribute' => $hasDeprecatedAttribute,
        'firstAttributeOffset' => $firstAttributeOffset,
    ];
}

function findDeclarationStartIndex(array $tokens, int $declIndex, bool $classLike): int
{
    $modifiers = $classLike
        ? [T_FINAL, T_ABSTRACT, T_READONLY]
        : [T_PUBLIC, T_PROTECTED, T_PRIVATE, T_ABSTRACT, T_STATIC, T_FINAL];

    $start = $declIndex;
    for ($i = $declIndex - 1; $i >= 0; $i--) {
        $token = $tokens[$i];

        if (is_string($token)) {
            if (trim($token) === '') {
                continue;
            }
            break;
        }

        if ($token[0] === T_WHITESPACE) {
            continue;
        }

        if (in_array($token[0], $modifiers, true)) {
            $start = $i;
            continue;
        }

        break;
    }

    return $start;
}

function appendDeprecatedTagToDoc(string $doc, string $indent): string
{
    $trimmed = rtrim($doc);
    $trimmed = preg_replace('/\*\/\s*$/', '', $trimmed) ?? $trimmed;
    $trimmed = rtrim($trimmed);

    return $trimmed . "\n{$indent} * @deprecated " . DEPRECATION_MESSAGE . "\n{$indent} */";
}

function detectIndent(string $code, int $offset): string
{
    $lineStart = strrpos(substr($code, 0, $offset), "\n");
    $lineStart = $lineStart === false ? 0 : $lineStart + 1;
    $prefix = substr($code, $lineStart, $offset - $lineStart);

    return preg_match('/^[ \t]*/', $prefix, $m) === 1 ? $m[0] : '';
}

function findAttributeStartIndex(array $tokens, int $attributeIndex): int
{
    $start = $attributeIndex;
    while ($start > 0) {
        $previous = $tokens[$start - 1];
        if (is_array($previous) && $previous[0] === T_WHITESPACE) {
            $start--;
            continue;
        }
        if (is_string($previous) && trim($previous) === '') {
            $start--;
            continue;
        }
        break;
    }

    return $start;
}

function attributeContainsDeprecated(array $tokens, int $attributeIndex): bool
{
    $text = '';
    $depth = 0;
    for ($i = $attributeIndex, $max = count($tokens); $i < $max; $i++) {
        $part = tokenText($tokens[$i]);
        $text .= $part;

        $depth += substr_count($part, '[');
        $depth -= substr_count($part, ']');
        if ($depth <= 0 && str_contains($text, ']')) {
            break;
        }
    }

    return str_contains($text, 'Deprecated');
}

function isAnonymousClass(array $tokens, int $classIndex): bool
{
    for ($i = $classIndex - 1; $i >= 0; $i--) {
        $token = $tokens[$i];

        if (is_string($token)) {
            if (trim($token) === '') {
                continue;
            }
            break;
        }

        if (in_array($token[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT], true)) {
            continue;
        }

        return $token[0] === T_NEW;
    }

    return false;
}

function isClassConstantFetch(array $tokens, int $classIndex): bool
{
    for ($i = $classIndex - 1; $i >= 0; $i--) {
        $token = $tokens[$i];

        if (is_string($token)) {
            if (trim($token) === '') {
                continue;
            }
            return false;
        }

        if (in_array($token[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT], true)) {
            continue;
        }

        return $token[0] === T_DOUBLE_COLON;
    }

    return false;
}

function isAnonymousFunction(array $tokens, int $functionIndex): bool
{
    for ($i = $functionIndex + 1, $max = count($tokens); $i < $max; $i++) {
        $token = $tokens[$i];

        if (is_string($token)) {
            if (trim($token) === '') {
                continue;
            }
            return $token === '(';
        }

        if (in_array($token[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT], true)) {
            continue;
        }

        return $token[0] !== T_STRING;
    }

    return false;
}

function tokenText(array|string $token): string
{
    return is_array($token) ? $token[1] : $token;
}
