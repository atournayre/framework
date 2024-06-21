<?php

declare(strict_types=1);

use Arkitect\ClassSet;
use Arkitect\CLI\Config;
use Atournayre\PHPArkitect\Builder\RuleBuilder;

return static function (Config $config): void {
    $classSet = ClassSet::fromDir(__DIR__.'/../../src');

    $rules = RuleBuilder::create()
        ->rules();

    $config->add($classSet, ...$rules);
};
