<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/../../{src,tests}')
    ->notPath([
        // Delete cache file when you want to update the rules
        __DIR__.'/../../src/Contracts/Response/ResponseInterface.php',
        __DIR__.'/../../src/Primitives/Collection/CollectionTrait.php',
        __DIR__.'/../../src/Wrapper/Collection.php',
    ])
;

$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@Symfony' => true,
        'concat_space' => ['spacing' => 'none'],
        'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'clean_namespace' => true,
    ])
    ->setRiskyAllowed(true)
    ->setLineEnding("\n")
    ->setFinder($finder)
    ->setCacheFile(__DIR__.'/.php-cs-fixer.cache')
    ;
