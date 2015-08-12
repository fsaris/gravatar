<?php
defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['avatarProviders']['gravatarProvider'] = array(
		'sorting' => 50,
		'provider' => \MiniFranske\Gravatar\AvatarProvider\GravatarProvider::class
	);
}