<?php

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'account/register' => [
		'controller' => 'account',
		'action' => 'register',
    ],
    
    'news/show' => [
        'controller' => 'news',
		'action' => 'show',
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

];