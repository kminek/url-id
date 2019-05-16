<?php

$header = <<<EOT
This file is part of the `kminek/url-id` package.

(c) Grzesiek W <kontakt@kminek.pl>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOT;

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__.'/src',
        __DIR__.'/tests'
    ])
;

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setUsingCache(false)
    ->setRules([
        '@Symfony' => true,
        'declare_strict_types' => true,
        'strict_param' => true,
        'ordered_imports' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'header_comment' => [
            'header' => $header,
        ],
    ])
    ->setFinder($finder)
;
