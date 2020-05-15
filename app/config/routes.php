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

	'interests' => [ //+
        'controller' => 'myInterests',
		'action' => 'interests',
	],

	'schedule' => [
        'controller' => 'study',
		'action' => 'schedule',
	],

	'fotos' => [
        'controller' => 'gallery',
		'action' => 'fotos',
	],

	'test' => [//+
        'controller' => 'exam',
		'action' => 'test',
	],

	'contacts' => [//+
        'controller' => 'communication',
		'action' => 'contacts',
	],

	'guestBook' => [//+
        	'controller' => 'guest',
		'action' => 'book',
	],

	'comments/upload' => [//+
        	'controller' => 'comments',
		'action' => 'upload',
	],

	'blogEditor'=> [//+
		'controller' => 'blog',
		'action' => 'upload',
	],

	'blog'=> [//+
		'controller' => 'diary',
		'action' => 'blog',
	],

	'blog/upload' => [//+
		'controller' => 'records',
		'action' => 'upload',
	]
];
