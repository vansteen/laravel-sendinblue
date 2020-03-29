<?php

$header = <<<EOF
@package    Vansteen\Sendinblue
@author     Thomas Van Steenwinckel <code@1234.pm>
@link       https://github.com/vansteen/laravel-sendinblue
@license    https://github.com/vansteen/laravel-sendinblue/blob/master/license.md (MIT License)

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->in(__DIR__ . '/benchmark')
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return PhpCsFixer\Config::create()
    ->setRules([
        'psr0' => false,
        '@PSR2' => true,
        'blank_line_after_namespace' => true,
        'braces' => true,
        'class_definition' => true,
        'elseif' => true,
        'function_declaration' => true,
        'indentation_type' => true,
        'line_ending' => true,
        'lowercase_constants' => true,
        'lowercase_keywords' => true,
        'method_argument_space' => [
            'ensure_fully_multiline' => true, ],
        'no_break_comment' => true,
        'no_closing_tag' => true,
        'no_spaces_after_function_name' => true,
        'no_spaces_inside_parenthesis' => true,
        'no_trailing_whitespace' => true,
        'no_trailing_whitespace_in_comment' => true,
        'single_blank_line_at_eof' => true,
        'single_class_element_per_statement' => [
            'elements' => ['property'],
        ],
        'single_import_per_statement' => true,
        'single_line_after_imports' => true,
        'switch_case_semicolon_to_colon' => true,
        'switch_case_space' => true,
        'visibility_required' => true,
        'encoding' => true,
        'full_opening_tag' => true,
        'concat_space' => ['spacing' => 'one']
    ])
    ->setFinder($finder);
