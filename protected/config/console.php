<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array_merge(
    array(
        'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        'name' => 'My Console Application',
        'aliases' => array(
            'root' => dirname(__FILE__). DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR, 
            'vendor' => 'root.vendor',
            'public' => 'root.public',
            'booster' => 'root.vendor.clevertech.yii-booster.src',
            'bootstrap' => 'booster',
            'modules' => 'application.modules',
        ),
        'import' => array(
            'application.models.*',
            'application.components.*',
            'application.extensions.*',
            'vendor.yiiext.activerecord-relation-behavior.*',
        ),
        // preloading 'log' component
        'preload' => array('log'),

        // application components
        'components' => array(
            'log' => array(
                'class' => 'CLogRouter',
                'routes' => array(
                    array(
                        'class' => 'CFileLogRoute',
                        'levels' => 'error, warning',
                    ),
                ),
            ),
        ),
    ),
    require(__DIR__ . '/env/'.(defined('YII_DEBUG')?'dev':'prod').'.php')
);