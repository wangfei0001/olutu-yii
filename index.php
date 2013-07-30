<?php
# Used only for including corresponding
# server configuration file,
# can be predefined by Apache
# (SetEnv APPLICATION_ENV "production")
# ['local' | 'dev' | 'production']
defined('APPLICATION_ENV') or define('APPLICATION_ENV','local');

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';

$configMain = require_once( dirname( __FILE__ ) . '/protected/config/main.php' );


$configServer = require_once dirname(__FILE__) .'/protected/config/' .APPLICATION_ENV .'.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);

$config = CMap::mergeArray($configMain, $configServer);


Yii::createWebApplication($config)->run();
