<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Backend Gravatar',
    'description' => 'AvatarProvider for Gravatar support in backend.',
    'category' => 'be',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Frans Saris',
    'author_email' => 'franssaris@gmail.com',
    'author_company' => '',
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '7.5.0-8.7.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
