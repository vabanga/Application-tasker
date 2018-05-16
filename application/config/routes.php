<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
    'main/index/{page:\d+}' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'main/index/{page:\d+}/{sort:\w+}' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'main/createTask' => [
    'controller' => 'main',
    'action' => 'createTask',
    ],
    // AdminController
    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],
    'admin/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],
    'admin/tasks/{page:\d+}' => [
        'controller' => 'admin',
        'action' => 'tasks',
    ],
    'admin/tasks' => [
        'controller' => 'admin',
        'action' => 'tasks',
    ],
];