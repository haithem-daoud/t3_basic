<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'T3 Basic',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '10.2.0-10.4.99',
            'fluid_styled_content' => '10.2.0-10.4.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'TYPO3\\T3Basic\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Haithem Daoud',
    'author_email' => 'haithemdaoud.se@gmail.com',
    'author_company' => 'TYPO3 Developer - Freelance',
    'version' => '1.0.0',
];
