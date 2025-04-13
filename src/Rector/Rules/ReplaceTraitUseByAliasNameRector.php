<?php

declare(strict_types=1);

namespace Atournayre\Rector\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\TraitUse;
use PhpParser\Node\Stmt\Use_;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

final class ReplaceTraitUseByAliasNameRector extends AbstractRector implements ConfigurableRectorInterface
{
    /**
     * @api
     *
     * @var string
     */
    public const OLD_TRAIT_NAME = 'old_trait_name';

    /**
     * @api
     *
     * @var string
     */
    public const NEW_TRAIT_NAME = 'new_trait_name';

    /**
     * @api
     *
     * @var string
     */
    public const NEW_ALIAS_NAME = 'new_alias_name';

    /**
     * @api
     *
     * @var string
     */
    public const SHORT_NAME_TO_REPLACE = 'short_name_to_replace';

    /**
     * @var array<string, string>
     */
    private array $configuration = [];

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace trait use by alias name',
            [
                new ConfiguredCodeSample(
                    // Code before the rector run
                    <<<'CODE_SAMPLE'
use MyPackage\CollectionTrait;

class SomeController
{
    use CollectionTrait;
    
    public function someMethod()
    {
        $collection = Collection::of(['foo', 'bar']);
    }
}
CODE_SAMPLE
                    ,
                    // Code after the rector run
                    <<<'CODE_SAMPLE'
use MyPackage\Collection as Collection_;
                    
class SomeController
{
    use Collection_;
    
    public function someMethod()
    {
        $collection = Collection_::of(['foo', 'bar']);
    }
}
CODE_SAMPLE
                    ,
                    [
                        self::OLD_TRAIT_NAME => 'MyPackage\CollectionTrait',
                        self::NEW_TRAIT_NAME => 'MyPackage\Collection',
                        self::NEW_ALIAS_NAME => 'Collection_',
                        self::SHORT_NAME_TO_REPLACE => 'Collection',
                    ]
                ),
            ]
        );
    }

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [
            Use_::class,
            TraitUse::class,
            StaticCall::class,
        ];
    }

    /**
     * @param Use_|TraitUse|StaticCall $node
     */
    public function refactor(Node $node): ?Node
    {
        // Skip if configuration is not provided
        if ([] === $this->configuration) {
            return null;
        }

        if ($node instanceof Use_) {
            return $this->refactorUseStatement($node);
        }

        if ($node instanceof TraitUse) {
            return $this->refactorTraitUse($node);
        }

        return $this->refactorStaticCall($node);
    }

    /**
     * @param array<string, string> $configuration
     */
    public function configure(array $configuration): void
    {
        $this->configuration = $configuration;

        Assert::keyExists($this->configuration, self::OLD_TRAIT_NAME);
        Assert::keyExists($this->configuration, self::NEW_TRAIT_NAME);
        Assert::keyExists($this->configuration, self::NEW_ALIAS_NAME);
        Assert::keyExists($this->configuration, self::SHORT_NAME_TO_REPLACE);
    }

    private function refactorUseStatement(Use_ $node): ?Use_
    {
        foreach ($node->uses as $use) {
            if ($this->isName($use->name, $this->configuration[self::OLD_TRAIT_NAME])) {
                $use->name = new Name($this->configuration[self::NEW_TRAIT_NAME]);
                $use->alias = new Identifier($this->configuration[self::NEW_ALIAS_NAME]);

                return $node;
            }
        }

        return null;
    }

    private function refactorTraitUse(TraitUse $node): ?TraitUse
    {
        $hasChanged = false;
        $oldTraitParts = explode('\\', $this->configuration[self::OLD_TRAIT_NAME]);
        $shortOldTraitName = end($oldTraitParts);

        foreach ($node->traits as $key => $trait) {
            $traitName = $this->getName($trait);

            if ($traitName === $shortOldTraitName || $traitName === $this->configuration[self::OLD_TRAIT_NAME]) {
                $node->traits[$key] = new Name($this->configuration[self::NEW_ALIAS_NAME]);
                $hasChanged = true;
            }
        }

        return $hasChanged ? $node : null;
    }

    private function refactorStaticCall(StaticCall $node): ?StaticCall
    {
        if ($this->isName($node->class, $this->configuration[self::SHORT_NAME_TO_REPLACE])) {
            $node->class = new Name($this->configuration[self::NEW_ALIAS_NAME]);

            return $node;
        }

        return null;
    }
}
