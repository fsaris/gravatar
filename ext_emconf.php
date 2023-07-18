<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Backend Gravatar',
    'description' => 'AvatarProvider for Gravatar support in backend.',
    'category' => 'be',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'author' => 'Frans Saris',
    'author_email' => 'franssaris@gmail.com',
    'version' => '2.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
