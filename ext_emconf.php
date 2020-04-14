<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Backend Gravatar',
    'description' => 'AvatarProvider for Gravatar support in backend.',
    'category' => 'be',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'author' => 'Frans Saris',
    'author_email' => 'franssaris@gmail.com',
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
