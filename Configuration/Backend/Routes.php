<?php

return [
	'gravatar' => [
		'path' => '/gravatar',
		'target' => \MiniFranske\Gravatar\Controller\ProxyController::class . '::proxyAction',
	],
];