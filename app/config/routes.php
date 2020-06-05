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

	'blog'=> [//+						Мой Блог
		'controller' => 'blog',
		'action' => 'blog',
	],

	'blogEditor'=> [//+					Редактор Блога
		'controller' => 'blog',
		'action' => 'send',
	],

	'admin/guest/upload' => [//+			Загрузка отзывов
		'controller' => 'guest',
		'action' => 'upload',
	],

	'admin/blog/upload' => [//+				Загрузка сообщений блога
		'controller' => 'blog',
		'action' => 'upload',
	],

	'admin' => [
		'controller' => 'mainAdmin',
		'action' => 'index',
	],

	'admin/statistic/visitings' => [
		'controller' => 'statistic',
		'action' => 'visitings',
	],

	'registration' => [
		'controller' => 'user',
		'action' => 'registration',
	],

	'login' => [
		'controller' => 'user',
		'action' => 'login',
	],

	'exit' => [
		'controller' => 'user',
		'action' => 'exit',
	]
];
