<?php

$header = '';

$finder = PhpCsFixer\Finder::create()
    ->in('src');
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony'                     => true,
        'array_syntax'                 => ['syntax' => 'short'],
        'blank_line_after_opening_tag' => true,
        'header_comment'               => ['header' => $header],
        'ordered_imports'              => ['sortAlgorithm' => 'alpha'],
        'binary_operator_spaces'       => ['align_double_arrow' => true, 'align_equals' => true],
        'php_unit_construct'           => true,
        'php_unit_strict'              => true,
        'self_accessor'                => false,
    ])
    ->setUsingCache(true)
    ->setFinder($finder)
;
