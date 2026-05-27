<?php

declare(strict_types=1);

namespace Atournayre\PHPStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node>
 */
final class DeprecationConventionRule implements Rule
{
    private const MESSAGE = 'Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework';

    public function getNodeType(): string
    {
        return Node::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if ($node instanceof ClassLike) {
            return $this->validateTypeDeprecation($node);
        }

        if ($node instanceof ClassMethod) {
            return $this->validateMethodDeprecation($node);
        }

        return [];
    }

    /**
     * Class/interface/trait/enum must have standardized @deprecated in PHPDoc.
     *
     * @return array<int, \PHPStan\Rules\IdentifierRuleError>
     */
    private function validateTypeDeprecation(ClassLike $node): array
    {
        $doc = $node->getDocComment()?->getText() ?? '';
        if (str_contains($doc, '@deprecated '.self::MESSAGE)) {
            return [];
        }

        return [
            RuleErrorBuilder::message(
                'Type must declare "@deprecated '.self::MESSAGE.'" in PHPDoc.'
            )->build(),
        ];
    }

    /**
     * Methods must use attribute-only deprecation: #[\Deprecated("...")], no @deprecated method PHPDoc.
     *
     * @return array<int, \PHPStan\Rules\IdentifierRuleError>
     */
    private function validateMethodDeprecation(ClassMethod $node): array
    {
        $errors = [];

        if (!$this->hasDeprecatedAttribute($node)) {
            $errors[] = RuleErrorBuilder::message(
                'Method must declare #[\\Deprecated("'.self::MESSAGE.'")].'
            )->build();
        }

        $doc = $node->getDocComment()?->getText() ?? '';
        if (str_contains($doc, '@deprecated '.self::MESSAGE)) {
            $errors[] = RuleErrorBuilder::message(
                'Method deprecation must be attribute-only; remove method @deprecated PHPDoc.'
            )->build();
        }

        return $errors;
    }

    private function hasDeprecatedAttribute(ClassMethod $node): bool
    {
        foreach ($node->attrGroups as $group) {
            foreach ($group->attrs as $attr) {
                $name = ltrim($attr->name->toString(), '\\');
                if ($name !== 'Deprecated') {
                    continue;
                }

                if (\count($attr->args) !== 1) {
                    continue;
                }

                $value = $attr->args[0]->value;
                if (!$value instanceof Node\Scalar\String_) {
                    continue;
                }

                if ($value->value === self::MESSAGE) {
                    return true;
                }
            }
        }

        return false;
    }
}

