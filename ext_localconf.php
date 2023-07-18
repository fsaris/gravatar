<?php

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['avatarProviders']['gravatarProvider'] = [
    'provider' => \MiniFranske\Gravatar\AvatarProvider\GravatarProvider::class,
    'after' => ['defaultAvatarProvider'],
];
