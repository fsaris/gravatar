<?php
defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['avatarProviders']['gravatarProvider'] = [
        'provider' => \MiniFranske\Gravatar\AvatarProvider\GravatarProvider::class,
        'after' => ['imageProvider']
    ];
}
