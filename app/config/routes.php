<?php

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'aboutMe' => [
        'controller' => 'me',
		'action' => 'about',
	],

	'interest' => [
        'controller' => 'me',
		'action' => 'interest',
	],

	'schedule' => [
        'controller' => 'study',
		'action' => 'schedule',
	],

	'fotos' => [
        'controller' => 'gallery',
		'action' => 'fotos',
	],

	'test' => [
        'controller' => 'study',
		'action' => 'test',
	],

	'contacts' => [
        'controller' => 'me',
		'action' => 'contacts',
	],

	'guestBook' => [
        	'controller' => 'guest',
		'action' => 'guestBook',
	],

	'comments' => [
        	'controller' => 'guest',
		'action' => 'comments',
	],
];
