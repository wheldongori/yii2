<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');
defined('YII_APP_BASE_PATH') or define('YII_APP_BASE_PATH', __DIR__.'/../../');

require_once __DIR__ .  '/../../vendor/autoload.php';
require_once __DIR__ .  '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../config/bootstrap.php';

// $_SERVER['Yii2ConfigFile'] = dirname(__FILE__) . '/config/codeception-local.php';
$_SERVER['Yii2ConfigFile'] = dirname(dirname(__FILE__) . '/config/codeception-local.php');

