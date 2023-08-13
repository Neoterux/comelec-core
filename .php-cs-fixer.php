<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(['bootstrap', 'storage', 'vendor'])
    ->name('*.php')
    ->name('_ide_helper.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2'                      => true,
        'array_indentation'          => true,
        'array_syntax'               => ['syntax' => 'short'],
        'combine_consecutive_unsets' => true,
        'single_quote'               => true,
        'binary_operator_spaces'     => [
            'operators' => [
                '=>' => 'align',
                '='  => 'align'
            ]
        ],
        'braces' => [
            'allow_single_line_closure' => true,
        ],
        'no_blank_lines_before_namespace' => true,
        'ordered_imports'                 => ['sort_algorithm' => 'alpha'],
        'no_unused_imports'               => true,
        'ternary_operator_spaces'         => true,
        'trim_array_spaces'               => true,
        'whitespace_after_comma_in_array' => true,
        'space_after_semicolon'           => true
    ])
    ->setLineEnding("\n")
    ->setFinder($finder);
