<?php

return [

	'' => [//							Главная
		'controller' => 'main',
		'action' => 'index',
	],

	'aboutMe' => [//					Обо мне
        'controller' => 'me',
		'action' => 'about',
	],

	'interests' => [ //+				Мои интересы
        'controller' => 'myInterests',
		'action' => 'interests',
	],

	'schedule' => [//					Учеба
        'controller' => 'study',
		'action' => 'schedule',
	],

	'fotos' => [//						Фотоальбом
        'controller' => 'gallery',
		'action' => 'fotos',
	],

	'test' => [//+						Тест
        'controller' => 'exam',
		'action' => 'test',
	],

	'contacts' => [//+					Контакты
        'controller' => 'communication',
		'action' => 'contacts',
	],

	'guestBook' => [//+					Гостевая книга
        	'controller' => 'guest',
		'action' => 'book',
	],

	'comments/upload' => [//+			Загрузка отзывов
        	'controller' => 'comments',
		'action' => 'upload',
	],

	'blog'=> [//+						Мой Блог
		'controller' => 'diary',
		'action' => 'blog',
	],

	'blogEditor'=> [//+					Редактор Блога
		'controller' => 'blog',
		'action' => 'send',
	],

	'blog/upload' => [//+				Загрузка сообщений блога
		'controller' => 'records',
		'action' => 'upload',
	]
];
