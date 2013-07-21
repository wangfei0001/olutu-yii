<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
//        'zii.behaviors.CTimestampBehavior'
//        'application.extensions.CAdvancedArFindBehavior'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
/*                'post/<id:\d+>/<title:.*?>'=>'post/view',*/
                // REST patterns
                array('api/list', 'pattern'=>'api/v<version:\d+>/<controller:\w+>', 'verb'=>'GET'),
                array('api/create', 'pattern'=>'api/v<version:\d+>/<controller:\w+>', 'verb'=>'POST'),
                array('api/view', 'pattern'=>'api/v<version:\d+>/<controller:\w+>/<id:\d+>', 'verb'=>'GET'),
                array('api/update', 'pattern'=>'api/v<version:\d+>/<controller:\w+>/<id:\d+>', 'verb'=>'PUT'),
                array('api/delete', 'pattern'=>'api/v<version:\d+>/<controller:\w+>/<id:\d+>', 'verb'=>'DELETE'),

                // Other controllers
                array('api/list', 'pattern' => 'api/v<version:\d+>/<controller:\w+>/<id:\d+>/<association:\w+>', 'verb'=>'GET'),
                array('api/create', 'pattern' => 'api/v<version:\d+>/<controller:\w+>/<id:\d+>/<association:\w+>', 'verb'=>'POST'),
                array('api/view', 'pattern' => 'api/v<version:\d+>/<controller:\w+>/<id:\d+>/<association:\w+>/<association_id:\d+>', 'verb'=>'GET'),
                array('api/update', 'pattern' => 'api/v<version:\d+>/<controller:\w+>/<id:\d+>/<association:\w+>/<association_id:\d+>', 'verb'=>'PUT'),
                array('api/delete', 'pattern' => 'api/v<version:\d+>/<controller:\w+>/<id:\d+>/<association:\w+>/<association_id:\d+>', 'verb'=>'DELETE'),

                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
/*		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=olutu',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'error/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);