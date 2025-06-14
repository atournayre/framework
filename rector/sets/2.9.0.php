<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig) : void {
    $rectorConfig->sets([
        __DIR__ . '/2.7.0.php',
        __DIR__ . '/2.8.0.php',
    ]);
};

