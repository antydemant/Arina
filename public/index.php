<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set(date_default_timezone_get());
$env = (isset($_SERVER['APP_ENV'])) ? $_SERVER['APP_ENV'] : 'prod';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', ($env == 'dev'));
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

// change the following paths if necessary
$yii = dirname(__FILE__) . '/../vendor/yiisoft/yii/framework/yii.php';
$config = dirname(__FILE__) . '/../protected/config/main.php';

require_once($yii);
Yii::createWebApplication($config)->run();
