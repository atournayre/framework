<?php

declare(strict_types=1);

use Arkitect\ClassSet;
use Arkitect\CLI\Config;

return static function (Config $config): void {
    $classSet = ClassSet::fromDir(__DIR__.'/../../src');

    $rules = [];

    $config->add($classSet, ...$rules);
};
