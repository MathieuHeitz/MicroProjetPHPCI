<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = (new Finder())->in([
    __DIR__ . '/src',
    __DIR__ . '/tests',
]);

return (new Config())
    ->setRules(['@PSR12' => true])
    ->setFinder($finder)
    ->setUsingCache(true);
