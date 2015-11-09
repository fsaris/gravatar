<?php
$EM_CONF[$_EXTKEY] = array(
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
	'version' => '0.0.4',
	'constraints' => array(
		'depends' => array(
			'typo3' => '7.5.0-7.6.99',
		),
		'conflicts' => array(),
		'suggests' => array(),
	),
);
