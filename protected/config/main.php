<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'defaultController' => 'Note',
	'sourceLanguage' => 'en_US',
	'language' => 'uk',
	// 'theme'=>'default',
	// preloading 'log' component
	'preload'=>array(
		'log',
		'bootstrap'
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
        'admin',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),
	

	// application components
	'components'=>array(
		'bootstrap'=>array(
            'class'=>'application.vendor.clevertech.yii-booster.src.components.Bootstrap',
        ),
		'viewRenderer'=>array(
  			'class' => 'application.vendor.delfit.yii-haml.HamlViewRenderer',
			),
		'authManager'=>array(
    			'class'=>'PhpAuthManager',
    			// 'defaultRoles'=>array('role_guest'),
			),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            // это значение устанавливается по умолчанию
            'loginUrl'=>array('note/login'),
    	),

    	'cache'=>array(
            'class'=>'system.caching.CFileCache',
        ),
	
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>/<note_id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false,
		),
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;port=5432;dbname=classDB',
			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => '1234',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'note/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'info, tracer',
					// 'logPath'=>'/var/www/final/logging/',
					'logFile'=>'application.log',
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